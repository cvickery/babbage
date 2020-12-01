module divide_by_2dot5M(dividedOut, clockIn);
output 			dividedOut;
input  			clockIn;
reg [21:0]	counter;

assign dividedOut = counter[21];

always @(posedge clockIn)
begin
	counter = counter - 22'd01;
	if (counter == 0)
	begin
		counter = 22'd2517500;
	end
end
endmodule