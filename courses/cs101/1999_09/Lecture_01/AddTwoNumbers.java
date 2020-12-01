//  AddTwoNumbers.java

import javax.swing.*;

//  Class AddTwoNumbers
//  ------------------------------------------------------------------
/**
  *   Application to add two numbers entered by the user, and display
  *   their sum.
  *
  *   @author   C. Vickery
  *   @version  1.0
  */
  public class AddTwoNumbers {

  //  Method main()
  //  ----------------------------------------------------------------
  /**
    *   Prompts the user to enter two numbers, then displays their
    *   sum.  Uses zero in place of invalid entries.
    *
    *   @param  argv  Not used.
    *   @return Nothing.
    */
    public static void main( String[] argv ) {

      String  str;
      float   value_1, value_2, result;

      //  Get the first number
      str = JOptionPane.showInputDialog( null, "Enter a value" );

      try {
        value_1 = Float.parseFloat( str );
      }
      catch ( NumberFormatException nfe ) {
        value_1 = 0;
      }

      //  Get the second number
      str = JOptionPane.showInputDialog( null, "Enter another value" );

      try {
        value_2 = Float.parseFloat( str );
      }
      catch ( NumberFormatException nfe ) {
        value_2 = 0;
      }

      //  Compute the sum and display it
      str = Float.toString( value_1 + value_2 );

      JOptionPane.showMessageDialog( null, "The sum is " + str );

      System.exit( 0 );

    }

  }

