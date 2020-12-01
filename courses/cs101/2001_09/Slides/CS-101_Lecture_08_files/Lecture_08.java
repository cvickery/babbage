/** Illustrates method overloading in a class hierarchy.
  *   @author C. Vickery
  */
  public class Lecture_08
  {

  /** Creates objects belonging to each class in a hierarchy that goes
    * from Object -> P -> Q, and then performs various operations to 
    * show what is allowed and what the effects are.
    *
    *  @param  args  Command line arguments.
    */
    public static void main( String[] args )
    {
      //  Create the objects and invoke their toString() methods.
      Object o = new Object();
      P      p = new P();
      Q      q = new Q();
      System.out.println( o.toString() );
      System.out.println( p.toString() );
      System.out.println( q.toString() );

      //  Invoke allowed methods provided by the subclasses.
      p.methodP();
      q.methodQ();
      q.methodP();

      //  A Q "is-a" Object, so the following statements are okay,
      //  although a cast has to be used to tell the compiler we know
      //  what we are doing when we use a reference of type Object to
      //  invoke a subclass' method.
      o = q;
      ((P)o).methodP();

      //  The following assignment tells the compiler we know what we
      //  are doing, but the JVM will check it at run time, see that the
      //  assignment is illegal, and throw an exception to abort the
      //  program.
      q = (Q)p;
      //  If the previous statement <i>had</i> worked, the following
      //  statement would have been meaningless, since the object
      //  referenced by q is actually a P object, for which there is no
      //  methodQ().
      q.methodQ();
      System.exit( 0 );
    }
  }

/** Subclass of Object which provides methodP(), and which does not
  * override Object's toString() method.
  *   @author C. Vickery
  */
  class P extends Object
  {
  /** Prints a message identifying itself.
    */
    void methodP()
    {
      System.out.println( "This is methodP()." );
    }
  }

/** Subclass of P which provides methodQ(), and which does override
  * Object's toString() method.
  *   @author C. Vickery
  */
  class Q extends P
  {

  /** Prints a message identifying itself.
    */
    void methodQ()
    {
      System.out.println( "This is methodQ()." );
    }

  /** Overrides the toString() method defined in class Object; returns a
    * string identifying itself.
    *   @return A message identifying itself.
    */
    public String toString()
    {
      return "This is toString() defined in class Q.";
    }
  }

