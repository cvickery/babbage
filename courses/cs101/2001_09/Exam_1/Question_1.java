
public class Question_1
{
  static Sub_1  subRef;

  public static void main( String[] args )
  {
    Super_1 superRef = new Super_1();
            subRef   = new Sub_1();

    System.out.println( superRef );
    System.out.println( subRef   );
    System.exit( 0 );
  }
}

class Super_1
{
  public String toString()
  {
    return "Hello from Super_1";
  }
}

class Sub_1 extends Super_1
{
  public String toString()
  {
    return "Hello from Sub_1";
  }
}

