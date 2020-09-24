//  floating-point_test.cc

//  Test floating-point exception reporting for operations on Binary32 operands.
//  Christopher Vickery
//  Queens College of CUNY

/*  Utility program to work with Binary32 floating-point numbers entered as
 *  hexadecimal values. The FP flags reported here should agree with the Status
 *  reported by the IEEE-754 Floating-Point Analyzer at
 *  http://babbage.cs.qc.cuny.edu/IEEE-754 in all cases. The FE flags reported
 *  here, however, have been observed to vary across platforms.
 *
 *  This code is distributed under an MIT-style license: you are free to use it
 *  in any way you wish provided only that you cite the author if you publish or
 *  sell it.
 */

/*  History
 *  -------
 *  December 29, 2011
 *  Read floating-point arguments from the command line, divide, and report the
 *  results, along with any FE_xxx flags that are set as a result.
 *
 *  December 30, 2011
 *  Changed flags from -n and -d to -1 and -2 and implemented all four
 *  operations, with flags (a, s, m, d) to suppress the ones not wanted.
 *  Re-coded the structs for flag names and values to use the macros themselves
 *  for the values rather than hand-coding their numbers, making the code not
 *  platform-specific.
 *  Reversed the hex32 and decimal order in the outputs; changed to g format for
 *  the decimals.
 *  Changed program name from underflow_test to floating-point_test.
 */

//  Sample runs:
//  ---------------------------------------------------------------------------
/*
 *  $ ./floating-point_test
 *  $ ./floating-point_test -asm -1 3F800000 -2 7e800000
 *  $ ./floating-point_test -asm -1 3F800000 -2 7e7fffff
 *  $ ./floating-point_test -asm -1 3F800000 -2 7f000001
 *  $ ./floating-point_test -asm -1 0AFFFFFF -2 4A000000
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>

#include <math.h>
#include <fenv.h>

//  Flag names and values
struct flags_t
{
  const char *name;
  const int   value;
};

//  FE flag macros
static const flags_t fe_flags[] =
  {
    {"FE_INEXACT",          FE_INEXACT},
    {"FE_UNDERFLOW",        FE_UNDERFLOW},
    {"FE_OVERFLOW",         FE_OVERFLOW},
    {"FE_DIVBYZERO",        FE_DIVBYZERO},
    {"FE_INVALID",          FE_INVALID},
  };

//  FP flag macros
static const flags_t  fp_flags[] =
  {
    {"FP_NAN",          FP_NAN},
    {"FP_INFINITE",     FP_INFINITE},
    {"FP_ZERO",         FP_ZERO},
    {"FP_NORMAL",       FP_NORMAL},
    {"FP_SUBNORMAL",    FP_SUBNORMAL},
  };

static const int num_fe_flags = sizeof(fe_flags) / sizeof(flags_t);
static const int num_fp_flags = sizeof(fp_flags) / sizeof(flags_t);

//  Alias for hex32 input of Binary32 values
union alias_t {
  float               ieee32;
  u_int32_t           hex32;
  double              ieee64;
  u_int64_t           hex64;
  long double         ieee128;
  u_int64_t           hex128[2];
  };

//  validate_hex()
//  ---------------------------------------------------------------------------
/*  Verify that a string is a valid hex constant with 8, 16, or 32 digits.
 *    Returns the hex-only string (no 0X), or NULL if not valid.
 */
  void *
  validate_hex(const char *str)
  {
    static const char hex_chars[] = "0123456789ABCDEFabcdef";
    char *arg = (char*)malloc(33);

    //  Strip leading 0x or 0X
    if (!strncmp(str, "0x", 2) || !strncmp(str, "0X", 2))
    {
      strcpy(arg, &str[2]);
    }
    else
    {
      strcpy(arg, str);
    }

    //  Validate hexiness
    bool is_hex = true;
    for (int i = 0; i < strlen(arg); i++)
    {
      if (NULL == strchr(hex_chars, arg[i]))
      {
        is_hex = false;
        break;
      }
    }

    //  Validate siziness
    if (is_hex)
    {
      int len = strlen(arg);
      if (len ==  8 || len == 16 || len == 32 ) return arg;
    }
    return NULL;
  }

//  main()
//  ---------------------------------------------------------------------------
/*  Process command line arguments; do the calculations; report the results.
 */
  int
  main(int argc, char *argv[], char *envp[])
  {
    //  The following pragma has no effect on the calculations in this program
    //  on my devlopment system, whether it is 'ON' or 'OFF.'
#pragma STDC FENV_ACCESS ON

    //  Verify environment
    //  -------------------------------------------------------------------------
    int float_size = -1, double_size = -1, long_double_size = -1;
    bool do_32 = true, do_64 = true, do_128 = true;

    if (getenv("NO_FLOAT"))  do_32  = false;
    if (getenv("NO_DOUBLE")) do_64  = false;
    if (getenv("NO_QUAD"))  do_128  = false;
    if (do_32)
    {
      float_size  = (sizeof(float) << 3);
    }
    if (do_64)
    {
      double_size = (sizeof(double) << 3);
    }
    if (do_128)
    {
      long_double_size = (sizeof(long double) << 3);
    }
    if ((do_32  && (float_size  != 32)) ||
        (do_64  && (double_size != 64)) ||
        (do_128 && (long_double_size != 128))
       )
    {
      fprintf(stderr, 
          "\nERROR: There is a mismatch between the way this program requires "
          "floating-point\nvalues to be stored and how they are actually stored "
          "on this machine:\n"
          "  Type          Required   Found\n"
          "  float         32 bits   %3d bits\n"
          "  double        64 bits   %3d bits\n"
          "  long double  128 bits   %3d bits\n"
          "You can disable unsupported data types by setting environment "
          " variables:\n"
          "  NO_FLOAT   No Binary32  support\n"
          "  NO_DOUBLE  No Binary64  support\n"
          "  NO_QUAD    No Binary128 support\n"
          "As things stand now: unable to proceed.\n",
          float_size, double_size, long_double_size);
      exit(EXIT_FAILURE);
    }
    //  Default operators
    bool add = true, sub = true, mul = true, div = true;

    //  Arguments, their defaults (1.0), and the result.
    alias_t arg1, arg2, result;
    memset(&arg1, '\0', sizeof(alias_t));
    memset(&arg2, '\0', sizeof(alias_t));
    arg1.ieee32 = 1.0;
    arg2.ieee32 = 1.0;

    //  Process command line options, if present.
    //  -------------------------------------------------------------------------
    /*    1 Hex first operand (addend, minuend, muliplicand, arg1)
     *    2 Hex second operand (augend, subtrahend, multiplier, arg2)
     *    a Suppress Add
     *    s Suppress Subtract
     *    m Suppress Multiply
     *    d Suppress Divide
     */
    int ch = NULL;
    while ((ch = getopt(argc, argv, "1:2:asmd")) != -1)
    {
      switch (ch)
      {
        case '1':
          {
            char *arg = (char *)validate_hex(optarg);
            int len = 0;
            if (arg) len = strlen(arg) << 2;
            switch (len)
            {
              case 32:
                arg1.hex32 = (unsigned int) strtol(arg, NULL, 16);
                break;
              case 64:
                arg1.hex64 = (unsigned long long) strtoll(arg, NULL, 16);
                break;
              case 128:
                {
                  char left[17] = "", right[17] = "";
                  strncat(left,  arg, 16);
                  strncat(right, arg + 16,   16);
                  arg1.hex128[0] = strtoull(left,  NULL, 16);
                  arg1.hex128[1] = strtoull(right, NULL, 16);
                  break;
                }
              default:
              fprintf(stderr, "%s (%d): invalid hexadecimal operand\n", optarg, len);
              exit(EXIT_FAILURE);
            }
printf("%08X\n%016lX\n%016lX%016lX\n",
    (unsigned int)arg1.hex32, 
    (unsigned long)arg1.hex64, 
    (unsigned long)arg1.hex128[0], (unsigned long)arg1.hex128[1]);
          }
          break;
        case '2': 
           {
            char *arg = (char *)validate_hex(optarg);
            int len = 0;
            if (arg) len = strlen(arg) << 2;
            switch (len)
            {
              case 32:
                arg2.hex32 = (unsigned int) strtol(arg, NULL, 16);
                break;
              case 64:
                arg2.hex64 = (unsigned long long) strtoll(arg, NULL, 16);
                break;
              case 128:
                {
                  char left[17] = "", right[17] = "";
                  strncat(left,  arg, 16);
                  strncat(right, arg + 16,   16);
                  arg2.hex128[0] = strtoull(left,  NULL, 16);
                  arg2.hex128[1] = strtoull(right, NULL, 16);
                  break;
                }
              default:
              fprintf(stderr, "%s (%d): invalid hexadecimal operand\n", optarg, len);
              exit(EXIT_FAILURE);
            }
printf("%08X\n%016lX\n%016lX%016lX\n",
    (unsigned int)arg2.hex32, 
    (unsigned long)arg2.hex64, 
    (unsigned long)arg2.hex128[0], (unsigned long)arg2.hex128[1]);
          }
          break;
        case 'a': add = false;
                  break;
        case 's': sub = false;
                  break;
        case 'm': mul = false;
                  break;
        case 'd': div = false;
                  break;
        default:  fprintf(stderr, "Invalid option: %c\n", ch);
                  exit(EXIT_FAILURE);
      }
    }

    //  Display arguments and their types
    //  -------------------------------------------------------------------------
    //  Argument 1
    const int   arg1_type     = fpclassify(arg1.ieee32);
    const char *arg1_type_str = "";
    for (int i = 0; i < num_fp_flags; i++)
    {
      if (arg1_type == fp_flags[i].value)
      {
        arg1_type_str = fp_flags[i].name;
        break;
      }
    }
    //  Argument 2
    const int   arg2_type     = fpclassify(arg2.ieee32);
    const char *arg2_type_str = "";
    for (int i = 0; i < num_fp_flags; i++)
    {
      if (arg2_type == fp_flags[i].value)
      {
        arg2_type_str = fp_flags[i].name;
        break;
      }
    }
    printf("\nArgument 1: %08X (%s)\nArgument 2: %08X (%s)\n",
        arg1.hex32,  arg1_type_str, arg2.hex32,  arg2_type_str);

    //  Addition
    //  -------------------------------------------------------------------------
    if (add)
    {
      feclearexcept(FE_ALL_EXCEPT);
      result.ieee32 = arg1.ieee32 + arg2.ieee32;

      //  Generate the fe_ results
      int   fe_exceptions = fetestexcept(FE_ALL_EXCEPT);
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
      int fp_type = fpclassify(result.ieee32);
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
      printf( "\nAddition\n--------\n"
              "  Addend:      %08X (%g)\n"
              "  Augend:      %08X (%g)\n"
              "  Result:      %08X (%g)\n"
              "  FE Flags:    %d (%s)\n"
              "  FP Type:     %s\n",
          arg1.hex32,        arg1.ieee32,
          arg2.hex32,        arg2.ieee32,
          result.hex32,      result.ieee32,
          fe_exceptions,  fe_flags_str,
          fp_type_str);
    }

    //  Subtraction
    //  -------------------------------------------------------------------------
    if (sub)
    {
      feclearexcept(FE_ALL_EXCEPT);
      result.ieee32 = arg1.ieee32 - arg2.ieee32;

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
      int fp_type = fpclassify(result.ieee32);
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
      printf( "\nSubtraction\n--------\n"
              "  Minuend:     %08X (%g)\n"
              "  Subtrahend:  %08X (%g)\n"
              "  Result:      %08X (%g)\n"
              "  FE Flags:    %d (%s)\n"
              "  FP Type:     %s\n",
          arg1.hex32,        arg1.ieee32,
          arg2.hex32,        arg2.ieee32,
          result.hex32,      result.ieee32,
          fe_exceptions,  fe_flags_str,
          fp_type_str);
    }

    //  Multiplication
    //  -------------------------------------------------------------------------
    if (mul)
    {
      feclearexcept(FE_ALL_EXCEPT);
      result.ieee32 = arg1.ieee32 * arg2.ieee32;

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
      int fp_type = fpclassify(result.ieee32);
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
      printf( "\nMultiplication\n--------\n"
              "  Multiplicand:  %08X (%g)\n"
              "  Multiplier:    %08X (%g)\n"
              "  Result:        %08X (%g)\n"
              "  FE Flags:      %d (%s)\n"
              "  FP Type:       %s\n",
          arg1.hex32,        arg1.ieee32,
          arg2.hex32,        arg2.ieee32,
          result.hex32,      result.ieee32,
          fe_exceptions,  fe_flags_str,
          fp_type_str);
    }

    //  Division
    //  -------------------------------------------------------------------------
    if (div)
    {
      feclearexcept(FE_ALL_EXCEPT);
      result.ieee32 = arg1.ieee32 / arg2.ieee32;

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
      int fp_type = fpclassify(result.ieee32);
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
      printf( "\nDivision\n--------\n"
              "  Numerator:    %08X (%g)\n"
              "  Denominator:  %08X (%g)\n"
              "  Result:       %08X (%g)\n"
              "  FE Flags:     %d (%s)\n"
              "  FP Type:      %s\n",
          arg1.hex32,        arg1.ieee32,
          arg2.hex32,        arg2.ieee32,
          result.hex32,      result.ieee32,
          fe_exceptions,  fe_flags_str,
          fp_type_str);
    }
    printf("\n");
    exit(EXIT_SUCCESS);
  }

