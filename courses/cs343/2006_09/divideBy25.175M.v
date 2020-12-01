//  divideBy25.175M.v

/*  Divides a 25.175MHz clock down to 1Hz
 *
 *  C. Vickery
 */
  module divideBy25175000(dividedOut, clockIn);
  output      dividedOut;
  input       clockIn;
  reg [24:0]  counter;
  reg         dividedOut;

  always @(posedge clockIn)
  begin
    counter = counter - 25'd01;
    if (counter == 0)
      begin
        counter = 25'd25175000;
        dividedOut = 1'b1;
      end
    else
      dividedOut = 1'b0;
  end
  endmodule
