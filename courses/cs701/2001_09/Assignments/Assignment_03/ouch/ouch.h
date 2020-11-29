//  $Id: ouch.h,v 1.2 2001/10/12 16:14:10 vickery Exp $

/*    Main header file for the ouch project.
 *
 *    $Log: ouch.h,v $
 *    Revision 1.2  2001/10/12 16:14:10  vickery
 *    Added limits.h and test for PATH_MAX.
 *
 *    Revision 1.1  2001/10/11 19:57:34  vickery
 *    Initial revision
 *
 */
#ifndef __OUCH_H__
#define __OUCH_H_

#include <assert.h>
#include <errno.h>
#include <limits.h>
#include <sys/stat.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

#ifndef PATH_MAX
#define PATH_MAX 8192
#endif

#define DEBUG
#define ABORT_IF( test, msg ) \
  if ( test ) \
  { \
    if ( 0 != errno ) \
      perror( msg ); \
    else \
      fprintf( stderr, "%s\n", msg ); \
    exit( 1 ); \
  }

struct dirNode_t
{
  char      *dirName;
  dirNode_t *nextNode;
};

extern dirNode_t *pathHead;

#endif

