//  unescape.cc

/*  Filter that converts %xx to corresponding bytes.  Used to make
 *  GET/POST query strings look like ASCII.  Any % characters in the
 *  input stream that are not immediately followed by two valid hex
 *  chars are passed through unchanged.
 *
 *    Test data: %23-%24-%25-%2a-%2B-%2b-%2c-%20-%41-%61 %az %q3
 *    Should be: #-$-%-*-+-+-,- -A-a %25az %25q3 
 *  
 *  Converts %0D%0A to <br />.
 *
 *    Test data: %2C%0D%0A %0D%23
 *    Should be: ,<br /> ^M#
 *
 *  ccv 2005-10-11
 */

#include <ctype.h>
#include <stdio.h>
#include <string.h>

static int ch1;

//  hexval()
//  ------------------------------------------------------------------
int
hexval(int c)
{
  const char *hextab = "0123456789ABCDEF";
  char *ptr = strchr(hextab, toupper(c));
  if ( ptr == 0 )
    return -1;
  return (ptr - hextab);
}

//  convert_escape()
//  ------------------------------------------------------------------
void
convert_escape()
{
  int ch2, ch3;
  ch2 = fgetc(stdin);
  int first = hexval(ch2);
  if (first < 0)
  {
    putchar(ch1);
    putchar(ch2);
  }
  else
  {
    ch3 = fgetc(stdin);
    int second = hexval(ch3);
    if (second < 0)
    {
      putchar(ch1);
      putchar(ch2);
      putchar(ch3);
    }
    else
    {
      char char1 = ((first << 4) | second);
      if (char1 != 0x0D)
      {
        putchar(char1);
        return;
      }
      ch1 = fgetc(stdin);
      if (ch1 != '%')
      {
        putchar(char1);
        putchar(ch1);
      }
      else
      {
        ch2 = fgetc(stdin);
        first = hexval(ch2);
        if (first < 0)
        {
          putchar(char1);
          putchar(ch1);
          putchar(ch2);
        }
        else
        {
          ch3 = fgetc(stdin);
          second = hexval(ch3);
          if (second < 0)
          {
            putchar(char1);
            putchar(ch1);
            putchar(ch2);
            putchar(ch3);
          }
          else
          {
            char char2 = ((first << 4) | second);
            if (char2 == 0x0A)
            {
              printf("<br />");
            }
            else
            {
              putchar(char1);
              putchar(char2);
            }
          }
        }
      }
    }
  }
}

//  main()
//  ------------------------------------------------------------------
int
main(int argc, char *argv[])
{

  while ( -1 != (ch1 = fgetc(stdin)) )
  {
    if (ch1 == '%')
    {
      convert_escape();
    }
    else
    {
      putchar(ch1);
    }
  }
}

