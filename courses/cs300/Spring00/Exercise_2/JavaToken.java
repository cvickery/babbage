//  JavaToken.java

public class JavaToken
{

  //  Manifest Constants
  //  ================================================================

  //  Token Types
  //  ----------------------------------------------------------------

  /** Undefined token.                                */
  public static final int JTT_Undefined       = 0;

  /** Token type for identifiers.                     */
  public static final int JTT_Identifier      = 1;

  /** Token type for keywords.                        */
  public static final int JTT_Keyword         = 2;

  /** Token type for String literals.                 */
  public static final int JTT_String          = 3;

  /** Token type for Character literals.              */
  public static final int JTT_Character       = 4;

  /** Token type for integer number literals.         */
  public static final int JTT_FixedPoint      = 5;

  /** Token type for real number literals.            */
  public static final int JTT_FloatingPoint   = 6;

  /** Token type for the boolean true literal.        */
  public static final int JTT_True            = 7;

  /** Token type for the boolean false literal.       */
  public static final int JTT_False           = 8;

  /** Token type for the reference type null literal. */
  public static final int JTT_Null            = 9;

  /** Token type for separators.                      */
  public static final int JTT_Separator       = 10;

  /** Token type for operators.                       */
  public static final int JTT_Operator        = 11;

  //  Keyword Ids
  //  ----------------------------------------------------------------

  /** Manifest constant for no keyword.                 */
  private static final int K_undefined        = 0;

  /** Manifest constant for the keyword "abstract."     */
  public  static final int K_abstract         = 1;

  /** Manifest constant for the keyword "boolean."      */
  public  static final int K_boolean          = 2;

  /** Manifest constant for the keyword "break."        */
  public  static final int K_break            = 3;

  /** Manifest constant for the keyword "byte."         */
  public  static final int K_byte             = 4;

  /** Manifest constant for the keyword "case."         */
  public  static final int K_case             = 5;

  /** Manifest constant for the keyword "catch."        */
  public  static final int K_catch            = 6;

  /** Manifest constant for the keyword "char."         */
  public  static final int K_char             = 7;

  /** Manifest constant for the keyword "class."        */
  public  static final int K_class            = 8;

  /** Manifest constant for the keyword "const."        */
  public  static final int K_const            = 9;

  /** Manifest constant for the keyword "continue."     */
  public  static final int K_continue         = 10;

  /** Manifest constant for the keyword "default."      */
  public  static final int K_default          = 11;

  /** Manifest constant for the keyword "do."           */
  public  static final int K_do               = 12;

  /** Manifest constant for the keyword "double."       */
  public  static final int K_double           = 13;

  /** Manifest constant for the keyword "else."         */
  public  static final int K_else             = 14;

  /** Manifest constant for the keyword "extends."      */
  public  static final int K_extends          = 15;

  /** Manifest constant for the keyword "final."        */
  public  static final int K_final            = 16;

  /** Manifest constant for the keyword "finally."      */
  public  static final int K_finally          = 17;

  /** Manifest constant for the keyword "float."        */
  public  static final int K_float            = 18;

  /** Manifest constant for the keyword "for."          */
  public  static final int K_for              = 19;

  /** Manifest constant for the keyword "goto."         */
  public  static final int K_goto             = 20;

  /** Manifest constant for the keyword "if."           */
  public  static final int K_if               = 21;

  /** Manifest constant for the keyword "implements."   */
  public  static final int K_implements       = 22;

  /** Manifest constant for the keyword "import."       */
  public  static final int K_import           = 23;

  /** Manifest constant for the keyword "instanceof."   */
  public  static final int K_instanceof       = 24;

  /** Manifest constant for the keyword "int."          */
  public  static final int K_int              = 25;

  /** Manifest constant for the keyword "interface."    */
  public  static final int K_interface        = 26;

  /** Manifest constant for the keyword "long."         */
  public  static final int K_long             = 27;

  /** Manifest constant for the keyword "native."       */
  public  static final int K_native           = 28;

  /** Manifest constant for the keyword "new."          */
  public  static final int K_new              = 29;

  /** Manifest constant for the keyword "package."      */
  public  static final int K_package          = 30;

  /** Manifest constant for the keyword "private."      */
  public  static final int K_private          = 31;

  /** Manifest constant for the keyword "protected."    */
  public  static final int K_protected        = 32;

  /** Manifest constant for the keyword "public."       */
  public  static final int K_public           = 33;

  /** Manifest constant for the keyword "return."       */
  public  static final int K_return           = 34;

  /** Manifest constant for the keyword "short."        */
  public  static final int K_short            = 35;

  /** Manifest constant for the keyword "static."       */
  public  static final int K_static           = 36;

  /** Manifest constant for the keyword "super."        */
  public  static final int K_super            = 37;

  /** Manifest constant for the keyword "switch."       */
  public  static final int K_switch           = 38;

  /** Manifest constant for the keyword "synchronized." */
  public  static final int K_synchronized     = 39;

  /** Manifest constant for the keyword "this."         */
  public  static final int K_this             = 40;

  /** Manifest constant for the keyword "throw."        */
  public  static final int K_throw            = 41;

  /** Manifest constant for the keyword "throws."       */
  public  static final int K_throws           = 42;

  /** Manifest constant for the keyword "transient."    */
  public  static final int K_transient        = 43;

  /** Manifest constant for the keyword "try."          */
  public  static final int K_try              = 44;

  /** Manifest constant for the keyword "void."         */
  public  static final int K_void             = 45;

  /** Manifest constant for the keyword "volatile."     */
  public  static final int K_volatile         = 46;

  /** Manifest constant for the keyword "while."        */
  public  static final int K_while            = 47;


  /** List of keywords.                                 */
  public  static final String[] keyword =
    {
      "abstract",     "boolean",      "break",          "byte",
      "case",         "catch",        "char",           "class",
      "const",        "continue",     "default",        "do",
      "double",       "else",         "extends",        "final",
      "finally",      "float",        "for",            "goto",
      "if",           "implements",   "import",         "instanceof",
      "int",          "interface",    "long",           "native",
      "new",          "package",      "private",        "protected",
      "public",       "return",       "short",          "static",
      "super",        "switch",       "synchronized",   "this",
      "throw",        "throws",       "transient",      "try",
      "void",         "volatile",     "while"
    };

  //  Operator Ids
  //  ----------------------------------------------------------------
  private static final int OP_undefined       = 0;
  private static final int OP_equal           = 1;    //  =
  private static final int OP_greater         = 2;    //  >
  private static final int OP_less            = 3;    //  <
  private static final int OP_not             = 4;    //  !
  private static final int OP_bitnot          = 5;    //  ~
  private static final int OP_if              = 6;    //  ?
  private static final int OP_else            = 7;    //  :
  private static final int OP_equalequal      = 8;    //  ==
  private static final int OP_lessequal       = 9;    //  <=
  private static final int OP_greaterequal    = 10;   //  >=
  private static final int OP_notequal        = 11;   //  !=
  private static final int OP_and             = 12;   //  &&
  private static final int OP_or              = 13;   //  ||
  private static final int OP_plusplus        = 14;   //  ++
  private static final int OP_minusminus      = 15;   //  --
  private static final int OP_plus            = 16;   //  +
  private static final int OP_minus           = 17;   //  -
  private static final int OP_multiply        = 18;   //  *
  private static final int OP_divide          = 19;   //  /
  private static final int OP_bitand          = 20;   //  &
  private static final int OP_bitor           = 21;   //  |
  private static final int OP_xor             = 22;   //  ^
  private static final int OP_modulo          = 23;   //  %
  private static final int OP_lshift          = 24;   //  <<
  private static final int OP_rshift          = 25;   //  >>
  private static final int OP_arshift         = 26;   //  >>>
  private static final int OP_plusequal       = 27;   //  +=
  private static final int OP_minusequal      = 28;   //  -=
  private static final int OP_multiplyequal   = 29;   //  *=
  private static final int OP_divideequal     = 30;   //  /=
  private static final int OP_andequal        = 31;   //  &=
  private static final int OP_orequal         = 32;   //  |=
  private static final int OP_xorequal        = 33;   //  ^=
  private static final int OP_moduloequal     = 34;   //  %=
  private static final int OP_lshiftequal     = 35;   //  <<=
  private static final int OP_rshiftequal     = 36;   //  >>=
  private static final int OP_arshiftequal    = 37;   //  >>>=

  /** List of operators.                                            */
  public  static final String[] operator =
  {
    "=",    ">",    "<",    "!",    "~",    "?",    ":",    "==",
    "<=",   ">=",   "!=",   "&&",   "||",   "++",   "--",   "+",
    "-",    "*",    "/",    "&",    "|",    "^",    "%",    "<<",
    ">>",   ">>>",  "+=",   "-=",   "*=",   "/=",   "&=",   "|=",
    "^=",   "%=",   "<<=",  ">>=",  ">>>="
  };

  //  Instance Information
  //  ================================================================
  private int     tokenType     = JTT_Undefined;
  private String  stringValue   = null;
  private long    longValue     = 0;
  private double  doubleValue   = 0.0;
  private boolean isString      = false;
  private boolean isLong        = false;
  private boolean isDouble      = false;

  //  Constructors
  //  ================================================================
  public JavaToken( int type, String sVal ) { /* ... */ }
  public JavaToken( int type, long lVal )   { /* ... */ }
  public JavaToken( int type, double dVal ) { /* ... */ }
  public JavaToken( int type )              { /* ... */ }

  //  Accessors
  //  ================================================================
  public int    getType()         { return tokenType;   }
  public String getStringValue()  { return stringValue; }
  public long   getLongValue()    { return longValue;   }
  public double getDoubleValue()  { return doubleValue; }

  //  Overrides
  //  ================================================================
  public String toString() { return super.toString(); }

}

