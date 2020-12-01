//  JavaTokenizer.java

import java.io.*;
import java.util.*;

//  Class JavaTokenizer
//  ------------------------------------------------------------------
/**
  *     Converts a JavaLexemes object into a stream of JavaToken
  *     objects.
  *
  *     @author   C. Vickery
  *     @version  1.0 - Spring 2000
  */
  public class JavaTokenizer                       implements Iterator
  {

  //  Instance Variables
  //  ================================================================
    private JavaLexemes jl;
    private String      thisLexemeSval;
    private int         thisLexemeType;

  //  Constructor
  //  ----------------------------------------------------------------
    public JavaTokenizer( JavaLexemes input )       throws IOException
    {
      jl = input;
      thisLexemeType  = JavaLexemes.LT_NOTHING;
      findNextLexeme();
    }

  //  Method findNextLexeme()
  //  ----------------------------------------------------------------
  private void findNextLexeme()                     throws IOException
  {
    thisLexemeType = jl.nextLexeme();
    while ( thisLexemeType != JavaLexemes.LT_LEXEME )
    {
      switch ( thisLexemeType )
      {
        case  JavaLexemes.LT_EOF:
                  return;

        default:
                  thisLexemeType  = jl.nextLexeme();
      }      
    }
    thisLexemeSval  = jl.lexeme;
  }

  //  Iterator Interface
  //  ================================================================
  public boolean  hasNext()
  {
    return thisLexemeType != JavaLexemes.LT_EOF;
  }
  public Object   next()
  {
    String returnVal = thisLexemeSval;
    try
    {
      findNextLexeme();
    }
    catch ( IOException ioe )
    {
      System.err.println( "Error reading" );
    }
    return returnVal;
  }
  public void     remove()  { }

  }

