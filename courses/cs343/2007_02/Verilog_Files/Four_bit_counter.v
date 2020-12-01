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

module Four_bit_counter(
	Clock,
	Limit_3,
	Limit_2,
	Limit_1,
	Limit_0,
	Out_0,
	Out_1,
	Out_2,
	Out_3,
	Max_Value
);

input	Clock;
input	Limit_3;
input	Limit_2;
input	Limit_1;
input	Limit_0;
output	Out_0;
output	Out_1;
output	Out_2;
output	Out_3;
output	Max_Value;

wire	SYNTHESIZED_WIRE_34;
wire	SYNTHESIZED_WIRE_1;
wire	SYNTHESIZED_WIRE_4;
wire	SYNTHESIZED_WIRE_7;
wire	SYNTHESIZED_WIRE_9;
wire	SYNTHESIZED_WIRE_35;
wire	SYNTHESIZED_WIRE_11;
wire	SYNTHESIZED_WIRE_13;
wire	SYNTHESIZED_WIRE_15;
wire	SYNTHESIZED_WIRE_17;
reg	SYNTHESIZED_WIRE_36;
wire	SYNTHESIZED_WIRE_18;
reg	SYNTHESIZED_WIRE_37;
wire	SYNTHESIZED_WIRE_19;
reg	SYNTHESIZED_WIRE_38;
wire	SYNTHESIZED_WIRE_20;
reg	SYNTHESIZED_WIRE_39;
wire	SYNTHESIZED_WIRE_21;
wire	SYNTHESIZED_WIRE_22;
wire	SYNTHESIZED_WIRE_23;
wire	SYNTHESIZED_WIRE_24;
wire	SYNTHESIZED_WIRE_40;
wire	SYNTHESIZED_WIRE_32;

assign	Out_0 = SYNTHESIZED_WIRE_36;
assign	Out_1 = SYNTHESIZED_WIRE_37;
assign	Out_2 = SYNTHESIZED_WIRE_38;
assign	Out_3 = SYNTHESIZED_WIRE_39;
assign	SYNTHESIZED_WIRE_34 = 1;
assign	SYNTHESIZED_WIRE_40 = 0;




always@(posedge Clock or negedge SYNTHESIZED_WIRE_34 or negedge SYNTHESIZED_WIRE_34)
begin
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_36 <= 0;
	end
else
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_36 <= 1;
	end
else
	begin
	SYNTHESIZED_WIRE_36 <= SYNTHESIZED_WIRE_1;
	end
end
assign	SYNTHESIZED_WIRE_17 =  ~Limit_0;

always@(posedge Clock or negedge SYNTHESIZED_WIRE_34 or negedge SYNTHESIZED_WIRE_34)
begin
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_38 <= 0;
	end
else
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_38 <= 1;
	end
else
	begin
	SYNTHESIZED_WIRE_38 <= SYNTHESIZED_WIRE_4;
	end
end

always@(posedge Clock or negedge SYNTHESIZED_WIRE_34 or negedge SYNTHESIZED_WIRE_34)
begin
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_39 <= 0;
	end
else
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_39 <= 1;
	end
else
	begin
	SYNTHESIZED_WIRE_39 <= SYNTHESIZED_WIRE_7;
	end
end
assign	SYNTHESIZED_WIRE_1 = SYNTHESIZED_WIRE_9 & SYNTHESIZED_WIRE_35;
assign	SYNTHESIZED_WIRE_32 = SYNTHESIZED_WIRE_11 & SYNTHESIZED_WIRE_35;
assign	SYNTHESIZED_WIRE_4 = SYNTHESIZED_WIRE_13 & SYNTHESIZED_WIRE_35;
assign	SYNTHESIZED_WIRE_7 = SYNTHESIZED_WIRE_15 & SYNTHESIZED_WIRE_35;
assign	SYNTHESIZED_WIRE_21 = SYNTHESIZED_WIRE_17 ~^ SYNTHESIZED_WIRE_36;
assign	SYNTHESIZED_WIRE_23 = SYNTHESIZED_WIRE_18 ~^ SYNTHESIZED_WIRE_37;
assign	SYNTHESIZED_WIRE_24 = SYNTHESIZED_WIRE_19 ~^ SYNTHESIZED_WIRE_38;
assign	SYNTHESIZED_WIRE_18 =  ~Limit_1;
assign	SYNTHESIZED_WIRE_22 = SYNTHESIZED_WIRE_20 ~^ SYNTHESIZED_WIRE_39;
assign	SYNTHESIZED_WIRE_35 = ~(SYNTHESIZED_WIRE_21 & SYNTHESIZED_WIRE_22 & SYNTHESIZED_WIRE_23 & SYNTHESIZED_WIRE_24);

\7483 	b2v_inst22(.B4(SYNTHESIZED_WIRE_40),
.C0(SYNTHESIZED_WIRE_40),.A1(SYNTHESIZED_WIRE_36),.A2(SYNTHESIZED_WIRE_37),.B1(SYNTHESIZED_WIRE_34),.B2(SYNTHESIZED_WIRE_40),.A3(SYNTHESIZED_WIRE_38),.B3(SYNTHESIZED_WIRE_40),.A4(SYNTHESIZED_WIRE_39),.S3(SYNTHESIZED_WIRE_13),.S4(SYNTHESIZED_WIRE_15),.S2(SYNTHESIZED_WIRE_11),.S1(SYNTHESIZED_WIRE_9));
assign	Max_Value =  ~SYNTHESIZED_WIRE_35;
assign	SYNTHESIZED_WIRE_19 =  ~Limit_2;
assign	SYNTHESIZED_WIRE_20 =  ~Limit_3;

always@(posedge Clock or negedge SYNTHESIZED_WIRE_34 or negedge SYNTHESIZED_WIRE_34)
begin
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_37 <= 0;
	end
else
if (!SYNTHESIZED_WIRE_34)
	begin
	SYNTHESIZED_WIRE_37 <= 1;
	end
else
	begin
	SYNTHESIZED_WIRE_37 <= SYNTHESIZED_WIRE_32;
	end
end


endmodule
