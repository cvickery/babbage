public class IterativeFibonacci {
public static void main(String[] args) {

for (int i=0; i<23; i++) {
  System.out.println( i + ": " + Fibonacci(i) );
  }
System.exit(0);
}
static long Fibonacci( int n ) {
  long fBack2 = 0;
  long fBack1 = 1;
  long f = 0;

    if ( n < 0 ) return -1;   // error condition
    if ( n < 2 ) return  n;   // base conditions

    for (int i = 0; i < n; i++) {
      f = fBack1 + fBack2;
      fBack2 = fBack1;
      fBack1 = f;
      }
    return f;
    }
}
