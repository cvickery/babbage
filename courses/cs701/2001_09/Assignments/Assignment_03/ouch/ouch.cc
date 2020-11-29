//  $Id: ouch.cc,v 1.3 2001/10/12 16:14:10 vickery Exp $
/*
 *    $Log: ouch.cc,v $
 *    Revision 1.3  2001/10/12 16:14:10  vickery
 *    Used PATH_MAX to determine buffer size of full pathnames.
 *    Fixed stray usage message when no command line arguments.
 *
 *    Revision 1.2  2001/10/11 19:57:34  vickery
 *    Implemented -c and -? options.
 *
 *    Revision 1.1  2001/10/04 19:40:43  vickery
 *    Initial revision
 *
 */

#include "ouch.h"

//  Global Variables
//  ------------------------------------------------------------------
const uid_t     user_uid  = geteuid();
const gid_t     user_gid  = getegid();
      char      *PATH     = getenv( "PATH" );
      dirNode_t *pathHead = 0;

//  Local Prototypes
//  ------------------------------------------------------------------
char *findExecutable( const char * const );
bool isExecutable( const char * const ); 

//  main()
//  ------------------------------------------------------------------
/*
 *    Initialize pathDirs linked list.
 *    Process command line options.
 *      If -?
 *        Display Usage message
 *        Exit
 *      If -c
 *        Parse command line
 *        Locate the executable file
 *        Exec the command
 *      Else
 *        Exit
 */
  int
  main( int argc, char* argv[], char* envp[] )
  {
    char *fullPathname = 0;
    
    //  Initialize pathDirs linked list.

    ABORT_IF( 0 == PATH, "Ouch: No PATH\n" );

    char * pathCopy = (char*) malloc( 1 + strlen( PATH ) );
      ABORT_IF( 0 == pathCopy, "Ouch: malloc failed for pathCopy" );
    strcpy( pathCopy, PATH );
    pathHead = (dirNode_t *) malloc( sizeof(dirNode_t) );
      ABORT_IF( 0 == pathHead, "Ouch: malloc failed for pathHead" );
    pathHead->dirName = strtok( pathCopy, ":" );
      ABORT_IF( 0 == pathHead->dirName, "Ouch: Empty PATH" );
    pathHead->nextNode = 0;

    dirNode_t *nextNode = pathHead;
    char *dirName = 0;
    while ( 0 != (dirName = strtok( 0, ":" ) ) )
    {
      nextNode->nextNode = (dirNode_t*) malloc( sizeof(dirNode_t) );
        ABORT_IF( 0 == nextNode->nextNode, 
            "Ouch: malloc failed for directory node" );
      nextNode = nextNode->nextNode;
      nextNode->dirName = dirName;
      nextNode->nextNode = 0;
    }

    //  Process command line options.
    int optChar;
    while ( -1 != (optChar = getopt( argc, argv, "c:?" ) ) )
    {
      switch ( optChar )
      {
        case '?'  :
          //  Display Usage message
          fprintf( stderr, "Usage: ouch [-?] | [-c subcommand]\n" );
          exit( 1 );

        case 'c' :
          //  Parse and execute a subcommand
          fullPathname = findExecutable( optarg );
          if ( 0 != fullPathname )
          {
            char **argVector = 
                (char**) malloc( (1 + argc) * sizeof( char* ) );
            ABORT_IF( 0 == argVector, 
                "Ouch: malloc failed for argVector" );
            argVector[0] = optarg;
            int vecIndex = 1;
            for (int i = optind; i < argc; i++ )
              argVector[vecIndex++] = argv[ i ];
            argVector[ vecIndex ] = 0;
            
            //  Display full pathname and exec the subcommand
            printf( "Full pathname: %s\n", fullPathname );
            execve( fullPathname, argVector, envp );
            perror( "Ouch: execve" );
            exit( 1 );
          }
          fprintf( stderr, "%s: Command not found\n", optarg );
          exit( 1 );

        default :
          fprintf( stderr, "Bad switch at %s line %d\n",
              __FILE__, __LINE__ );
          exit( 1 );
      }
    }
    //  No options found; be sure there were no arguments
    if ( argc != 1 )
    {
      fprintf( stderr, "Usage: ouch [-?] | [-c subcommand]\n" );
      exit( 1 );
    }
    exit( 0 );
  }

//  findExecutable()
//  -------------------------------------------------------------
/*
 *    Find an executable file and return its full pathname, if
 *    possible.  Return 0 if not found.
 *
 *    Note:  Memory for returned string is malloc'd.  It is the
 *    caller's responsibility to free it.
 *    
 *    Cases: Explicit pathname given, starting with /, ./, or ../
 *           Otherwise search PATH directories.
 *           Found file must be executable by user.
 */
  char *
  findExecutable( const char * const fileName )
  {
    //  Check if absolute path is given.
    if ( '/' == *fileName ||
         '.' == *fileName && '/' == *(fileName + 1) ||
         '.' == *fileName && '.' == *(fileName + 1) && 
         '/' == *(fileName + 2) )
    {
      if ( isExecutable( fileName ) )
      {
        //  Absolute path: malloc memory to return it to be consistent
        //  with case where relative path is given.
        char *returnVal = (char*) malloc( 1 + strlen( fileName ) );
        ABORT_IF( 0 == returnVal,
            "findExecutable: malloc failed for returnVal" );
        strcpy( returnVal, fileName );
        return returnVal;
      }
      else
        return 0;
    }

    // Not an absolute pathname: search PATH for possible executables
    dirNode_t *nextNode = pathHead;
    char *returnValue = 
        (char *) malloc( PATH_MAX + strlen(fileName + 2) );
      ABORT_IF( 0 == returnValue, 
      "findExecutable: malloc failed for returnVal" );
    while ( 0 != nextNode )
    {
      strcpy( returnValue, nextNode->dirName );
      strcat( returnValue, "/" );
      strcat( returnValue, fileName );
      if ( isExecutable( returnValue ) )
      {
        return returnValue;
      }
      nextNode = nextNode->nextNode;
    }
    //  Executable not found in any of the dirs in PATH
    free( returnValue );
    return 0;
  }

//  isExecutable()
//  ------------------------------------------------------------------
/*
 *    Checks if a file is ... ummm ... executable.
 */
  bool
  isExecutable( const char * const pathName )
  {
    struct stat statBuf;
    if ( -1 == stat( pathName, &statBuf ) )
      return false;
    
    // Check permissions
    int permissions = statBuf.st_mode & 07;
    if ( user_gid == statBuf.st_gid )
      permissions |= (statBuf.st_mode & 070) >> 3;
    if ( user_uid == statBuf.st_uid )
      permissions |= (statBuf.st_mode & 0700) >> 6;
    if ( (permissions & 05) == 05 )
      return true;
    else
      return false;
  }

