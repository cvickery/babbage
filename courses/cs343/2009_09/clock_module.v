// clock_module.v

//  Clock divider with four outputs available.
/*  Output should be used to enable flip-flops,
 *  not as clock pulses, to avoid clock skew.
 *
 *  C. Vickery
 *  October 2009
 */
module clock_module(
  input  wire clock_in,
  output reg divide_by_250M,
  output reg divide_by_100M,
  output reg divide_by_50M,
  output reg divide_by_10M);

  reg[27:0]  count_250M;
  reg[26:0]  count_100M;
  reg[25:0]  count_50M;
  reg[24:0]  count_10M;

  always @(posedge clock_in)
  begin
  count_100M <= count_100M + 27'd1;
  count_50M <= count_50M   + 26'd1;
  count_10M <= count_10M   + 25'd1;

  divide_by_100M <= 0;
  divide_by_50M  <= 0;
  divide_by_10M  <= 0;

  if (count_250M == 28'd250000000)
    begin
    count_250M <= 0;
    divide_by_250M <= 1;
    end
  else
    begin
    count_250M <= count_250M + 28'd1;
      divide_by_250M <= 0;
    end

  if (count_100M == 27'd100000000)
    begin
    count_100M <= 0;
    divide_by_100M <= 1;
    end
  else
    begin
    count_100M <= count_100M + 27'd1;
      divide_by_100M <= 0;
    end

  if (count_50M == 26'd50000000)
    begin
    count_50M <= 0;
    divide_by_50M <= 1;
    end
  else
    begin
    count_50M <= count_50M + 26'd1;
      divide_by_50M <= 0;
    end

  if (count_10M == 25'd10000000)
    begin
    count_10M <= 0;
    divide_by_10M <= 1;
    end
  else
    begin
    count_10M <= count_10M + 25'd1;
      divide_by_10M <= 0;
    end
  end

endmodule
