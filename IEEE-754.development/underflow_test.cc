//  underflow_test.cc

/*  Read floating-point arguments from the command line, divide, and report the
 *  results, along with any FE_xxx flags that are set as a result.
 *  Christopher Vickery
 *  December 29, 2011
 */

//  Sample runs:
//  ---------------------------------------------------------------------------
/*
 *  $ ./underflow_test -n 3F800000 -d 7e800000
 *   Numerator:    1 (3f800000)
 *   Denominator:  85070591730234615865843651857942052864 (7E800000)
 *   Result:       0 (00800000)
 *   FE Flags:     0 ()
 *   FP Type:      FP_NORMAL
 *
 *  $ ./underflow_test -n 3F800000 -d 7e7fffff
 *   Numerator:    1 (3f800000)
 *   Denominator:  85070586659632214952926045871129231360 (7E7FFFFF)
 *   Result:       0 (00800001)
 *   FE Flags:     32 (FE_INEXACT)
 *   FP Type:      FP_NORMAL
 *
 *  $ ./underflow_test -n 3F800000 -d 7f000001
 *   Numerator:    1 (3f800000)
 *   Denominator:  170141203742878835383357727663135391744 (7F000001)
 *   Result:       0 (00400000)
 *   FE Flags:     48 (FE_INEXACT | FE_UNDERFLOW)
 *   FP Type:      FP_SUBNORMAL
 *
 *  $ ./underflow_test -n 0AFFFFFF -d 4A000000
 *   Numerator:    0 (0affffff)
 *   Denominator:  2097152 (4A000000)
 *   Result:       0 (00800000)
 *   FE Flags:     48 (FE_INEXACT | FE_UNDERFLOW)
 *   FP Type:      FP_NORMAL
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

#include <math.h>
#include <fenv.h>
/*  From fenv.h:
    Definitions of floating-point exception macros
#define FE_INEXACT          0x0020
#define FE_UNDERFLOW        0x0010
#define FE_OVERFLOW         0x0008
#define FE_DIVBYZERO        0x0004
#define FE_INVALID          0x0001
#define FE_ALL_EXCEPT       0x003D

    Definitions of rounding direction macros
#define FE_TONEAREST        0x0000
#define FE_DOWNWARD         0x0400
#define FE_UPWARD           0x0800
#define FE_TOWARDZERO       0x0C00
 */

//  For printing flag values as names
struct flags_t
{
  const char *name;
  const int   value;
};

static const flags_t fe_flags[] =
  {
    {"FE_INEXACT",          0x0020},
    {"FE_UNDERFLOW",        0x0010},
    {"FE_OVERFLOW",         0x0008},
    {"FE_DIVBYZERO",        0x0004},
    {"FE_INVALID",          0x0001},
  };

static const flags_t  fp_flags[] =
  {
    {"FP_NAN",          1},
    {"FP_INFINITE",     2},
    {"FP_ZERO",         3},
    {"FP_NORMAL",       4},
    {"FP_SUBNORMAL",    5},
  };

static const int num_fe_flags = sizeof(fe_flags) / sizeof(flags_t);
static const int num_fp_flags = sizeof(fp_flags) / sizeof(flags_t);

//  For accepting hex input of Binary32 values
union alias_t {
  float r;
  unsigned int i;
  };

//  main()
//  ---------------------------------------------------------------------------
/*  Process command line arguments; do the division; report the results.
 */
int
main(int argc, char *argv[], char *envp[])
{

//  The following pragma has no effect
#pragma STDC FENV_ACCESS OFF

  //  Default operands
  alias_t numerator, denominator, result;
  numerator.r   = 1.0;
  denominator.r = 1.0;

  //  Process -n and -d command line options, if present.
  int ch = NULL;
  while ((ch = getopt(argc, argv, "n:d:")) != -1)
  {
    switch (ch)
    {
      case 'n': numerator.i   = (int) strtol(optarg, NULL, 16);
                break;
      case 'd': denominator.i = (int) strtol(optarg, NULL, 16);
                break;
      default:  fprintf(stderr, "Invalid option: %c\n", ch);
                exit(EXIT_FAILURE);
    }
  }

  //  Do the division
  feclearexcept(FE_ALL_EXCEPT);
  result.r = numerator.r/denominator.r;

  //  Generate the fe_ results
  int fe_exceptions   = fetestexcept(FE_ALL_EXCEPT);
  char *fe_flags_str  = (char*) malloc(1024);
  for (int i = 0; i < num_fe_flags; i++)
  {
    if ((fe_exceptions & fe_flags[i].value) == fe_flags[i].value)
    {
      if (0 != strlen(fe_flags_str)) fe_flags_str = strcat(fe_flags_str, " | ");
      fe_flags_str = strcat(fe_flags_str, fe_flags[i].name);
    }
  }

  //  Generate the fp_ results
  int fp_type = fpclassify(result.r);
  const char* fp_type_str = "";
  for (int i = 0; i < num_fp_flags; i++)
  {
    if (fp_type == fp_flags[i].value)
    {
      fp_type_str = fp_flags[i].name;
      break;
    }
  }
  
  //  Display the results
  printf( " Numerator:    %.0f (%08x)\n"
          " Denominator:  %.0f (%08X)\n"
          " Result:       %.0f (%08X)\n"
          " FE Flags:     %d (%s)\n"
          " FP Type:      %s\n", 
      numerator.r,    numerator.i, 
      denominator.r,  denominator.i, 
      result.r,       result.i, 
      fe_exceptions,  fe_flags_str,
      fp_type_str);
  exit(EXIT_SUCCESS);
}

