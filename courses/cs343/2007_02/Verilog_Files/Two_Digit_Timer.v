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

module Two_Digit_Timer(
	LeftLimit_0,
	LeftLimit_1,
	LeftLimit_2,
	LeftLimit_3,
	RightLimit_0,
	RightLimit_1,
	RightLimit_2,
	RightLimit_3,
	Start_Stop,
	Fast,
	Clock_25MHz,
	LeftDigit_A,
	LeftDigit_B,
	LeftDigit_C,
	LeftDigit_D,
	LeftDigit_E,
	LeftDigit_F,
	LeftDigit_G,
	RightDigit_A,
	RightDigit_B,
	RightDigit_C,
	RightDigit_D,
	RightDigit_E,
	RightDigit_F,
	RightDigit_G,
	RightDigit_DP,
	LeftDigit_DP
);

input	LeftLimit_0;
input	LeftLimit_1;
input	LeftLimit_2;
input	LeftLimit_3;
input	RightLimit_0;
input	RightLimit_1;
input	RightLimit_2;
input	RightLimit_3;
input	Start_Stop;
input	Fast;
input	Clock_25MHz;
output	LeftDigit_A;
output	LeftDigit_B;
output	LeftDigit_C;
output	LeftDigit_D;
output	LeftDigit_E;
output	LeftDigit_F;
output	LeftDigit_G;
output	RightDigit_A;
output	RightDigit_B;
output	RightDigit_C;
output	RightDigit_D;
output	RightDigit_E;
output	RightDigit_F;
output	RightDigit_G;
output	RightDigit_DP;
output	LeftDigit_DP;

wire	SYNTHESIZED_WIRE_0;
wire	SYNTHESIZED_WIRE_1;
wire	SYNTHESIZED_WIRE_2;
wire	SYNTHESIZED_WIRE_3;
wire	SYNTHESIZED_WIRE_4;
wire	SYNTHESIZED_WIRE_5;
wire	SYNTHESIZED_WIRE_6;
wire	SYNTHESIZED_WIRE_7;
wire	SYNTHESIZED_WIRE_8;
wire	SYNTHESIZED_WIRE_9;
wire	SYNTHESIZED_WIRE_10;

assign	RightDigit_DP = SYNTHESIZED_WIRE_1;




clock_module	b2v_inst(.Start_Stop(Start_Stop),
.Fast(Fast),.Clock_in(Clock_25MHz),.Clock_out(SYNTHESIZED_WIRE_1),.Not_Run(LeftDigit_DP));

Four_bit_counter	b2v_inst1(.Limit_0(LeftLimit_0),
.Limit_1(LeftLimit_1),.Limit_2(LeftLimit_2),.Limit_3(LeftLimit_3),.Clock(SYNTHESIZED_WIRE_0),.Out_0(SYNTHESIZED_WIRE_3),.Out_1(SYNTHESIZED_WIRE_4),.Out_2(SYNTHESIZED_WIRE_5),.Out_3(SYNTHESIZED_WIRE_6));

Four_bit_counter	b2v_inst2(.Limit_0(RightLimit_0),
.Limit_1(RightLimit_1),.Limit_2(RightLimit_2),.Limit_3(RightLimit_3),.Clock(SYNTHESIZED_WIRE_1),.Max_Value(SYNTHESIZED_WIRE_2),.Out_0(SYNTHESIZED_WIRE_7),.Out_1(SYNTHESIZED_WIRE_8),.Out_2(SYNTHESIZED_WIRE_9),.Out_3(SYNTHESIZED_WIRE_10));
assign	SYNTHESIZED_WIRE_0 =  ~SYNTHESIZED_WIRE_2;

hex2sevenseg	b2v_left_digit(.IN_1(SYNTHESIZED_WIRE_3),
.IN_2(SYNTHESIZED_WIRE_4),.IN_4(SYNTHESIZED_WIRE_5),.IN_8(SYNTHESIZED_WIRE_6),.A(LeftDigit_A),.B(LeftDigit_B),.C(LeftDigit_C),.D(LeftDigit_D),.E(LeftDigit_E),.F(LeftDigit_F),.G(LeftDigit_G));

hex2sevenseg	b2v_right_digit(.IN_1(SYNTHESIZED_WIRE_7),
.IN_2(SYNTHESIZED_WIRE_8),.IN_4(SYNTHESIZED_WIRE_9),.IN_8(SYNTHESIZED_WIRE_10),.A(RightDigit_A),.B(RightDigit_B),.C(RightDigit_C),.D(RightDigit_D),.E(RightDigit_E),.F(RightDigit_F),.G(RightDigit_G));


endmodule
