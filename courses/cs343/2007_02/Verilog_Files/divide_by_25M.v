module divide_by_25M(dividedOut, clockIn);
output 			dividedOut;
input  			clockIn;
reg [24:0]	counter;

assign dividedOut = counter[24];

always @(posedge clockIn)
begin
	counter = counter - 25'd01;
	if (counter == 0)
	begin
		counter = 25'd25175000;
	end
end
endmodule