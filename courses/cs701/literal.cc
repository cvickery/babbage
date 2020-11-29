// Can we overwrite literal strings?
#include <stdio.h>
int
main( int argc, char *argv[] )
{
  char *msg = "hello";
  strcpy( msg, "hi" );
  printf(":%s:%s:%s:\n", msg, "hello", "hi");
  return 0;
}
