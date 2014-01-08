//  chkformat.cc

/*    Counts tabs and long lines in source files.
 *
 *    Optional number argument is length of lines that count
 *    as 'long.'
 *
 *    Spring 2007:  Long lines are now wider than 80 chars,
 *    and the optional number argument is the bin size for
 *    giving counts of lines various multiples of that.
 *    Default is 20, so give counts of 80 + n*20 for n=0-4.
 *
 *    ccv Spring 2001
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define NUM_BINS 5
#define LAST_BIN (NUM_BINS - 1)

//  main()
//  ------------------------------------------------------------
/*
 *    argv[]:   1 Optional line length; default is 80
 *              2 ... file names
 */
int
main( int argc, char *argv[] )
{
  bool  returnOK = true;

  if ( (argc < 2) || (*argv[1] == '-') )
  {
    fprintf( stderr, "Usage: chk_format [bin_width] file...\n");
    exit( 1 );
  }
  int argn = 1;
  int bin_width = atoi( argv[argn] );
  if ( 0 == bin_width )
    bin_width = 20;
  else
    argn++;
  
  for ( ; argn < argc; argn++ )
  {
    FILE*   file = fopen( argv[argn], "r" );
    if ( 0 == file )
    {
      perror( argv[argn] );
      continue;
    }
    printf("File %s:", argv[argn]);
    int bins[NUM_BINS] = {0};
    int numTabs = 0;
    char  inBuf[1024];
    while ( 0 != fgets( inBuf, sizeof( inBuf), file ) )
    {
      //  Chomp ...
      while ( '\n' == inBuf[strlen(inBuf)-1] ||
              '\r' == inBuf[strlen(inBuf)-1] ||
              ' '  == inBuf[strlen(inBuf)-1] )
        inBuf[strlen(inBuf)-1] = '\0';

      int len = strlen( inBuf );
      if ( len > 80 )
      {
        int bin = (len - 80) /bin_width;
        bin = (bin > LAST_BIN) ? LAST_BIN : bin;
        bins[bin]++;
      }
      for (unsigned int i=0; i<strlen(inBuf); i++ )
        if ( '\t' == inBuf[i] )
          numTabs++;
    }
    if ( numTabs > 0 )
    {
      printf( "\n  %d tab character%s.",
               numTabs, ( (numTabs == 1) ? "" : "s" ) );
      returnOK = false;
    }
    for (int bin=0; bin<NUM_BINS; bin++)
    {
      if (bins[bin] > 0)
      {
        returnOK = false;
        switch (bin)
        {
          case 0:
          case 1:
          case 2:
          case 3:
            printf("\n  %d line%s between %d and %d characters wide",
                bins[bin], (bins[bin] == 1) ? "" : "s",
                80 + bin_width * bin, 80 + bin_width * (bin + 1) );
            break;
          case 4:
            printf("\n  %d line%s greater than %d characters wide",
                bins[bin], (bins[bin] == 1) ? "" : "s",
                80 + (NUM_BINS * bin_width) );
            break;
          default: fprintf(stderr, "Bad switch on line %d of %s\n",
                                                          __LINE__, __FILE__);
                   exit(1);
        }
      }
    }
  }
  if (returnOK) printf("  OK\n");
  else printf("\n");
  exit(0);

}

