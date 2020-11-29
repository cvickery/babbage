// $Id$
/*
 *  Functions
 *    main()    Prints all command line arguments, one per line.
 *
 *  C. Vickery
 *  Spring, 2001
 *
 *  Revision History
 *  $Log$
 *
 */
#include <stdio.h>
#include <stdlib.h>

//  Function main()
//  ------------------------------------------------------------------
/*
 *  Prints all command line arguments, one per line.
 *
 *    argc  Number of arguments
 *    argv  Array of argument strings
 *    Returns: 0 (EXIT_SUCCESS)
 *
 */
  int main( int argc, char *argv[] )
  {
    int i;
    for ( i=1; i<argc; i++)
    {
      printf( "Argument %02d: %s\n", i, argv[i] );
    }
    exit( EXIT_SUCCESS );
    return 0;
  }

