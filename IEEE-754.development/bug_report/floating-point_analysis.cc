#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>

union alias128_t
{
  long double real;
  u_int64_t   integer[2];
};

//  main()
//  ----------------------------------------------------------------------------
  int main(int argc, char *argv[])
  {
    //  Command line argument, if present is a real number.
    //  If omitted, an arbitrary value is used.
    long double l = 123.75;

    if (argc == 2)
    {
      l = strtold(argv[1], NULL);
    }

    alias128_t  binary128;
    binary128.real  = l;
    printf(
            "Binary128\n"
            "  Value:       %Lg (%016lX%016lX)\n",
            binary128.real,
            (unsigned long)binary128.integer[0],
            (unsigned long)binary128.integer[1]);

    exit(EXIT_SUCCESS);
  }

