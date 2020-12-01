#include <stdio.h>

main()
{
double  *dpointer, dvalue;
float   *fpointer, fvalue;
int     *ipointer;

   printf("Enter a value. ");
   scanf("%lg", &dvalue);
   printf("\n");

   fvalue   = dvalue;
   printf("% 8.8g\n", fvalue);
   fpointer = &fvalue;
   ipointer = (void *) fpointer;
   printf("%08X\n\n", *ipointer);

   printf("% 17.17g\n", dvalue);
   dpointer = &dvalue;
   ipointer = (void *) dpointer;
   printf("%08X%08X\n\n", *ipointer++, *ipointer);

}
