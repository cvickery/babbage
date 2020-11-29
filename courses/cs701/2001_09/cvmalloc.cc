//  $Id: cvmalloc.cc,v 2.1 2001/12/04 00:56:13 vickery Exp $

/*    Package to check for memory leaks.  The first time a program
 *    calls malloc, this program sets up to intercept all calls to
 *    malloc() and free(), and reports any problems at exit.  Based
 *    (loosely!) on sample code given at
 *    www.gnu.org/manual/glibc-2.2.3/html_node/libc_33.html.
 *
 *    $Log: cvmalloc.cc,v $
 *    Revision 2.1  2001/12/04 00:56:13  vickery
 *    Intercept calls to malloc and free.  Record the former, and
 *    verify that the latter were paired with calls to malloc.
 *    Set up atexit() to check the list of mallocs to be sure it is empty.
 *
 */

#include <stdio.h>
#include <stdlib.h>
#include <malloc.h>   //  This must go last to pick up __malloc_hook 
                      //  and __free_hook.


//  Tyepdefs and prototypes for hooks
//  ------------------------------------------------------------------
static void my_init_hook (void);

typedef void *m_hook(size_t, const void *);
static m_hook   my_malloc_hook;
static m_hook  *sys_malloc_hook;

typedef void f_hook( void *, const void * );
static f_hook   my_free_hook;
static f_hook  *sys_free_hook;

static void my_malloc_check( void );

//  Data structures for checking for leaks/errors.
//  ------------------------------------------------------------------
static long numMalloc = 0;
static long numFree   = 0;
struct node_t
{
  void    *ptr;
  size_t  size;
  node_t  *next;
} *head = 0;


//  Override initializing hook from the C library.
//  ------------------------------------------------------------------
void (*__malloc_initialize_hook) (void) = my_init_hook;

//  my_init_hook()
//  ------------------------------------------------------------------
/*
 *    This function gets called when the application does its first
 *    malloc, and sets up for the others to be called.
 */
  static void 
  my_init_hook (void)
  {
    if ( -1 == atexit( my_malloc_check ) )
    {
      perror( "my_init_hook: atexit" );
      exit( 1 );
    }
    //  Capture system hooks
    sys_malloc_hook = __malloc_hook;
    sys_free_hook   = __free_hook;
    //  Install hooks for this module
    __malloc_hook   = my_malloc_hook;
    __free_hook     = my_free_hook;
  }


//  my_malloc_hook()
//  ------------------------------------------------------------------
/*
 *    Called whenever the application calls malloc().
 */
  static void *
  my_malloc_hook (size_t size, const void *caller)
  {
    numMalloc++;
    void *result;

    /* Save underlaying hooks
        sys_malloc_hook = __malloc_hook;
        sys_free_hook   = __free_hook;
    */
    //  Install system hooks so malloc/free in the following code will
    //  not be intercepted recursively.
    __malloc_hook = sys_malloc_hook;
    __free_hook   = sys_free_hook;

    //  Do the malloc and record the result in our linked list.
    result = malloc ( size );
#ifdef DEBUG
    fprintf ( stderr, "malloc(%u) returns %p\n", (size_t) size, result);
#endif
    if ( !head )
    {
      head = (node_t*)malloc( sizeof( node_t ) );
      head->ptr = result;
      head->size = size;
      head->next = 0;
    }
    else
    {
      node_t *nxt = (node_t*)malloc( sizeof( node_t ) );
      nxt->ptr = result;
      nxt->size = size;
      nxt->next = head;
      head = nxt;
    }

    /* Restore all old hooks */
    __malloc_hook = sys_malloc_hook;
    __free_hook   = sys_free_hook;
    
    /* Restore our own hooks */
    __malloc_hook = my_malloc_hook;
    __free_hook   = my_free_hook;
    return result;
  }

//  my_free_hook()
//  ------------------------------------------------------------------
/*
 *    Called whenever the application calls free().
 */
  static void 
  my_free_hook (void *ptr, const void *caller)
  {
    numFree++;

    /* Save underlaying hooks
        sys_malloc_hook = __malloc_hook;
        sys_free_hook   = __free_hook;
     */

    //  Install system hooks so malloc/free in the following code will
    //  not be intercepted recursively.
    __malloc_hook = sys_malloc_hook;
    __free_hook   = sys_free_hook;

    //  Make sure the ptr being freed is in our list of recognized
    //  pointers.
    node_t *nxt = head;
    node_t *prev = 0;
    bool found = false;
    while ( nxt )
    {
      if ( ptr == nxt->ptr )
      {
        found = true;
        if (prev)
        {
          //  Remove from middle of list
          prev->next = nxt->next;
          free( nxt );
        }
        else
        {
          //  Remove from head of list.
          head = head->next;
        }
        break;
      }
      prev = nxt;
      nxt = nxt->next;
    }
    if ( !found )
    {
      fprintf( stderr, "*** Attempt to free location %p, which was not"
          " allocated by malloc.\n", ptr );
      exit( 1 );
    }
    
    //  The ptr is OK, let the free be handled by the system
#ifdef DEBUG
    fprintf( stderr, "free( %p )\n", ptr );
#endif
    free (ptr);

    //  Restore hooks to intercept malloc/free again
    __malloc_hook = my_malloc_hook;
    __free_hook   = my_free_hook;
  }

//  my_malloc_check()
//  ------------------------------------------------------------------
/*
 *    Invoked when program exits to check malloc/free usage.
 */
  void
  my_malloc_check( void )
  {
    fprintf( stderr,  "Total calls to malloc(): %8ld\n"
                      "Total calls to free():   %8ld\n",
                      numMalloc, numFree );
    node_t *nxt = head;
    if (head)
    {
      fprintf( stderr, 
              "*** The following allocations were not freed:\n" );
      while ( nxt )
      {
        fprintf(stderr, "    %d bytes at location %p\n", 
                                                 nxt->size, nxt->ptr );
        nxt = nxt->next;
      }
    }
  }

