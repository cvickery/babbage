// Copyright (C) 1991-2006 Altera Corporation
// Your use of Altera Corporation's design tools, logic functions 
// and other software and tools, and its AMPP partner logic 
// functions, and any output files from any of the foregoing 
// (including device programming or simulation files), and any 
// associated documentation or information are expressly subject 
// to the terms and conditions of the Altera Program License 
// Subscription Agreement, Altera MegaCore Function License 
// Agreement, or other applicable license agreement, including, 
// without limitation, that your use is for the sole purpose of 
// programming logic devices manufactured by Altera and sold by 
// Altera or its authorized distributors.  Please refer to the 
// applicable agreement for further details.

module clock_module(
	Start_Stop,
	Fast,
	Clock_in,
	Clock_out,
	Not_Run
);

input	Start_Stop;
input	Fast;
input	Clock_in;
output	Clock_out;
output	Not_Run;

wire	SYNTHESIZED_WIRE_9;
reg	SYNTHESIZED_WIRE_10;
wire	SYNTHESIZED_WIRE_3;
wire	SYNTHESIZED_WIRE_4;
wire	SYNTHESIZED_WIRE_5;
wire	SYNTHESIZED_WIRE_6;
wire	SYNTHESIZED_WIRE_7;
wire	SYNTHESIZED_WIRE_8;

assign	SYNTHESIZED_WIRE_9 = 1;




always@(posedge Start_Stop or negedge SYNTHESIZED_WIRE_9 or negedge SYNTHESIZED_WIRE_9)
begin
if (!SYNTHESIZED_WIRE_9)
	begin
	SYNTHESIZED_WIRE_10 = 0;
	end
else
if (!SYNTHESIZED_WIRE_9)
	begin
	SYNTHESIZED_WIRE_10 = 1;
	end
else
	SYNTHESIZED_WIRE_10 = SYNTHESIZED_WIRE_10 ^ SYNTHESIZED_WIRE_9;
end

divide_by_25M	b2v_inst1(.clockIn(Clock_in),
.dividedOut(SYNTHESIZED_WIRE_6));
assign	Not_Run =  ~SYNTHESIZED_WIRE_10;

divide_by_2dot5M	b2v_inst2(.clockIn(Clock_in),
.dividedOut(SYNTHESIZED_WIRE_4));
assign	SYNTHESIZED_WIRE_8 = SYNTHESIZED_WIRE_3 & SYNTHESIZED_WIRE_4;
assign	Clock_out = SYNTHESIZED_WIRE_10 & SYNTHESIZED_WIRE_5;
assign	SYNTHESIZED_WIRE_7 = Fast & SYNTHESIZED_WIRE_6;
assign	SYNTHESIZED_WIRE_5 = SYNTHESIZED_WIRE_7 | SYNTHESIZED_WIRE_8;
assign	SYNTHESIZED_WIRE_3 =  ~Fast;


endmodule
