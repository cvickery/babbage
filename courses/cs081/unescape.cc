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
 *  Special case: %26amp%3b becomes %26.  That is, &amp; gets passed
 *  through as a URL-encoded ampersand.  Shell script then has to
 *  convert that to a raw ampersand after splitting on ampersands.
 *  
 *  ccv 2005-10-11
 */

#include <ctype.h>
#include <stdio.h>
#include <string.h>

static int ch1;

//  check_for_amp()
//  ------------------------------------------------------------------
/*
 *    Checks input stream for special case %26amp%3b when %26 has been
 *    detected. Takes care of echoing the ampersand and other chars
 *    that are read in the process of looking downstream.
 *
 *    THIS FUNCTION IS NOT USED AND CAN BE DELETED SOMEDAY.
 */
  void
  check_for_amp()
  {
    char ch = fgetc(stdin);
    if (ch != 'a')
    {
      printf("%c", '&');
      ungetc(ch, stdin);
      return;
    }
    ch = fgetc(stdin);
    if (ch != 'm')
    {
      printf("%ca", '&');
      ungetc(ch, stdin);
      return;
    }
    ch = fgetc(stdin);
    if (ch != 'p')
    {
      printf("%cam", '&');
      ungetc(ch, stdin);
      return;
    }
    ch = fgetc(stdin);
    if (ch != '%')
    {
      printf("%camp", '&');
      ungetc(ch, stdin);
    }
    //  Got %amp% -- Have to differentiate between next two chars
    //  being 3b and xx, where xx are valid hex other than 3 and b.
    //  Problem is if multiple ungetc doesn't work.
    ch = fgetc(stdin);
    if (ch != '3')
    {
      printf("%camp", '&');
      ungetc(ch, stdin);
      ungetc('%', stdin);
      return;
    }
    char ch_b = fgetc(stdin);
    if ((ch_b != 'b') && (ch_b != 'B'))
    {
      printf("%camp", '&');
      ungetc(ch_b, stdin);
      ungetc(ch, stdin);
      ungetc('%', stdin);
      return;
    }
    //  Got it: substitute URL escape for ampersand.
    printf("%s", "%26");
  }

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
/*
 *  On entry, ch1 is '%' and the process is to see if the next two
 *  chars, ch2 and ch3, are valid hex digits.
 */
void
convert_escape()
{
  int ch2, ch3;
  ch2 = fgetc(stdin);
  int first = hexval(ch2);
  if (first < 0)
  {
    // %n where n is not a hex digit
    putchar(ch1);
    putchar(ch2);
  }
  else
  {
    ch3 = fgetc(stdin);
    int second = hexval(ch3);
    if (second < 0)
    {
      // %xn where n is not a hex digit
      putchar(ch1);
      putchar(ch2);
      putchar(ch3);
    }
    else
    {
      // Got valid %xx -- echo it if not CR or ampersand
      char char1 = ((first << 4) | second);
      if (char1 != 0x0D)
      {
        //  Check for encoded ampersand and restore it
        if (char1 == 0x26)
        {
          printf("%c26", '%');
        }
        else
        {
          putchar(char1);
        }
        return;
      }
      // Got cr.  If next char is lf, substitute <br />
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

