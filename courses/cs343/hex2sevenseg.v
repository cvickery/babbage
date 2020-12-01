// hex2sevenseg.v

/*  Converts a four-bit value (Hex) into controls for the seven elements of
 *  a seven-segment display (Segments).
 *
 *  Note:
 *    Design implements inverted logic for outputs to facilitate driving
 *    active-low seven-segement display devices.
 *
 *    2007-09: Changed I/Os to arrays to simplify connections to pins.
 *
 *  C. Vickery
 */
  module hex2sevenseg(
    output wire [6:0]   Segments,
    input  wire [3:0]   Hex);

    assign Segments[0] = !((Hex[1] & !Hex[0]) | (!Hex[3] & Hex[1]) | (Hex[2] & Hex[1]) |
        (!Hex[3] & Hex[2] & Hex[0]) |(Hex[3] & !Hex[2] & !Hex[1]) |
        (!Hex[3] & !Hex[2] & !Hex[0]) | (Hex[3] & Hex[2] & !Hex[0]));
    assign Segments[1] = !((!Hex[3] & !Hex[2]) | (!Hex[3] & !Hex[1] & !Hex[0]) |
        (!Hex[3] & Hex[1] & Hex[0]) | (Hex[3] & !Hex[1] & Hex[0]) |
        (!Hex[2] & !Hex[0]));
    assign Segments[2] = !((!Hex[3] & !Hex[1]) | (!Hex[3] & Hex[0]) | (!Hex[3] & Hex[2]) |
        (!Hex[1] & Hex[0]) |(Hex[3] & !Hex[2]));
    assign Segments[3] = !((Hex[3] & !Hex[1]) | (Hex[2] & Hex[1] & !Hex[0]) |
        (!Hex[3] & !Hex[2] & Hex[1]) | (!Hex[2] & !Hex[1] & !Hex[0]) |
        (!Hex[2] & Hex[1] & Hex[0]) | (Hex[2] & !Hex[1] & Hex[0]));
    assign Segments[4] = !((Hex[1] & !Hex[0]) | (Hex[3] & Hex[1]) | (Hex[3] & !Hex[0]) |
        (Hex[3] & Hex[2]) | (!Hex[2] & !Hex[0]));
    assign Segments[5] = !((!Hex[1] & !Hex[0]) | (Hex[3] & Hex[1]) | (Hex[3] & !Hex[2]) |
        (Hex[2] & !Hex[0]) | (!Hex[3] & Hex[2] & !Hex[1]));
    assign Segments[6] = !((Hex[1] & !Hex[0]) | (!Hex[2] & Hex[1]) | (Hex[3] & !Hex[2]) |
        (Hex[3] & Hex[0]) | (!Hex[3] & Hex[2] & !Hex[1]));

  endmodule

