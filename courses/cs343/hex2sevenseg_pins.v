// hex2sevenseg.v

/*  Converts a four-bit value (Hex) into controls for the seven elements of
 *  a seven-segment display (Segments).
 *
 *  Note:
 *    Design implements inverted logic for outputs to facilitate driving
 *    active-low seven-segement display devices.
 *
 *    2007-09: Changed I/Os to arrays to simplify connections to pins.
 *    2010-10: Created separate-pin version for those who don't like arrays!
 *
 *  C. Vickery
 */
  module hex2sevenseg(
    output wire Segment_6, Segment_5, Segment_4, Segment_3,
                Segment_2, Segment_1, Segment_0,
    input  wire Hex_3, Hex_2, Hex_1, Hex_0);

    assign Segment_0 = !((Hex_1 & !Hex_0) | (!Hex_3 & Hex_1) | (Hex_2 & Hex_1) |
        (!Hex_3 & Hex_2 & Hex_0) |(Hex_3 & !Hex_2 & !Hex_1) |
        (!Hex_3 & !Hex_2 & !Hex_0) | (Hex_3 & Hex_2 & !Hex_0));
    assign Segment_1 = !((!Hex_3 & !Hex_2) | (!Hex_3 & !Hex_1 & !Hex_0) |
        (!Hex_3 & Hex_1 & Hex_0) | (Hex_3 & !Hex_1 & Hex_0) |
        (!Hex_2 & !Hex_0));
    assign Segment_2 = !((!Hex_3 & !Hex_1) | (!Hex_3 & Hex_0) | (!Hex_3 & Hex_2) |
        (!Hex_1 & Hex_0) |(Hex_3 & !Hex_2));
    assign Segment_3 = !((Hex_3 & !Hex_1) | (Hex_2 & Hex_1 & !Hex_0) |
        (!Hex_3 & !Hex_2 & Hex_1) | (!Hex_2 & !Hex_1 & !Hex_0) |
        (!Hex_2 & Hex_1 & Hex_0) | (Hex_2 & !Hex_1 & Hex_0));
    assign Segment_4 = !((Hex_1 & !Hex_0) | (Hex_3 & Hex_1) | (Hex_3 & !Hex_0) |
        (Hex_3 & Hex_2) | (!Hex_2 & !Hex_0));
    assign Segment_5 = !((!Hex_1 & !Hex_0) | (Hex_3 & Hex_1) | (Hex_3 & !Hex_2) |
        (Hex_2 & !Hex_0) | (!Hex_3 & Hex_2 & !Hex_1));
    assign Segment_6 = !((Hex_1 & !Hex_0) | (!Hex_2 & Hex_1) | (Hex_3 & !Hex_2) |
        (Hex_3 & Hex_0) | (!Hex_3 & Hex_2 & !Hex_1));

  endmodule
