//  Vector_ex.java

import java.util.*;
import javax.swing.*;

public class Vector_ex {
  public static void main( String[] argv ) {

    //  Create a vector
    Vector books = new Vector();

    System.out.println( books.toString() );
    System.out.println( books.size() );

    JOptionPane.showMessageDialog(  null,
                                    "Look at initial state.",
                                    "Pause",
                                    JOptionPane.DEFAULT_OPTION
                                  );

    //  Add some String objects to it.
    System.out.println();
    books.add( "Java How to Program Second Edition"              );
    books.add( "Java How to Program Third Edition"               );
    books.add( "Mastering Java 2"                                );
    books.add( "Structured Computer Organization Fourth Edition" );

    System.out.println( books );
    System.out.println( books.size() );

    JOptionPane.showMessageDialog(  null,
                                    "Look at first list.",
                                    "Pause",
                                    JOptionPane.DEFAULT_OPTION
                                  );
    //  Modify one element
    System.out.println();
    System.out.println( books.get( 2 ) );
    System.out.println( books.set( 2,
      "The Java Virtual Machine Specification, Second Edition" )  );
    System.out.println( books.get( 2 ) );
    System.out.println( books );
    System.out.println( books.size() );

    JOptionPane.showMessageDialog(  null,
                                    "Look at element 3.",
                                    "Pause",
                                    JOptionPane.DEFAULT_OPTION
                                  );

    //  Iterate over all the elements of the vector
    System.out.println();
    Iterator iter = books.iterator();
    while ( iter.hasNext() ) {
      System.out.println( iter.next() );
    }
  }
}
