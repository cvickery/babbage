module divide_by_48M(dividedOut, clockIn);
output 			dividedOut;
input  			clockIn;
reg [25:0]	counter;

assign dividedOut = counter[25];

always @(posedge clockIn)
begin
	counter = counter - 26'd01;
	if (counter == 0)
	begin
		counter = 26'd48000000;
	end
end
endmodule