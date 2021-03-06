// hex2sevenseg.v

/*  Converts a four bit value into controls for the seven elements of
 *  a seven segment display.
 *
 *  Note:
 *	  Design implements inverted logic for both inputs and outputs.
 *
 *  C. Vickery
 */
  module hex2sevenseg(A, B, C, D, E, F, G, IN_1, IN_2, IN_4, IN_8);
    output      A, B, C, D, E, F, G;
    input       IN_1, IN_2, IN_4, IN_8;

    assign A = !((!IN_2 & IN_1) | (IN_8 & !IN_2) | (!IN_4 & !IN_2) |
        (IN_8 & !IN_4 & !IN_1) |(!IN_8 & IN_4 & IN_2) |
        (IN_8 & IN_4 & IN_1) | (!IN_8 & !IN_4 & IN_1));
    assign B = !((IN_8 & IN_4) | (IN_8 & IN_2 & IN_1) |
        (IN_8 & !IN_2 & !IN_1) | (!IN_8 & IN_2 & !IN_1) |
        (IN_4 & IN_1));
    assign C = !((IN_8 & IN_2) | (IN_8 & !IN_1) | (IN_8 & !IN_4) |
        (IN_2 & !IN_1) |(!IN_8 & IN_4));
    assign D = !((!IN_8 & IN_2) | (!IN_4 & !IN_2 & IN_1) |
        (IN_8 & IN_4 & !IN_2) | (IN_4 & IN_2 & IN_1) |
        (IN_4 & !IN_2 & !IN_1) | (!IN_4 & IN_2 & !IN_1));
    assign E = !((!IN_2 & IN_1) | (!IN_8 & !IN_2) | (!IN_8 & IN_1) | 
        (!IN_8 & !IN_4) | (IN_4 & IN_1));
    assign F = !((IN_2 & IN_1) | (!IN_8 & !IN_2) | (!IN_8 & IN_4) |
        (!IN_4 & IN_1) | (IN_8 & !IN_4 & IN_2));
    assign G = !((!IN_2 & IN_1) | (IN_4 & !IN_2) | (!IN_8 & IN_4) |
        (!IN_8 & !IN_1) | (IN_8 & !IN_4 & IN_2));

  endmodule

