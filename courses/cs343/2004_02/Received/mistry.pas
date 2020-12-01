unit main;

interface

uses
  Windows, Messages, SysUtils, Classes, Graphics, Controls, Forms, Dialogs,
  StdCtrls, ExtCtrls;

{*************************
  integer : 32 bit signed number
  ShortInt : 8 bit signed number
**************************}

type
   TMemory = class(TObject)
//   LowAddress, FHighAddress : ShortInt;
   LowAddress, FHighAddress : integer;
 {elements of memory/# of words
   1 word = 32 bits
   in reality it should be:
   Memory : array[0..Power(2,30)] of integer; }
   Memory : array[0..100] of integer;
//   Memory : array[1024*1024] of integer;
//   property HighAddress: integer read FHighAddress write FHighAddress;
   property HighAddress: integer read FHighAddress write FHighAddress;
//   property HighAddress: ShortInt read FHighAddress write FHighAddress;
   constructor Create;
   destructor Destroy;
   //reads a byte(8 bit) address and returns a 32 bit data value
   //This is the data from memory going to the CPU - C bus
//   function Read(address : ShortInt) : integer;
   function Read(address : integer) : integer;
   //writes a 32 bit value to the 8 bit address
   //This is the data on the B- bus
//   procedure Write( value : integer; address : ShortInt);
   procedure Write( value : integer; address : integer);
end;

{type TALU = class(TObject)

     function AndCCFunc(ABus,BBus : integer): integer;
     function OrCCFunc(ABus,BBus : integer): integer;
     function NorCCFunc(ABus,BBus : integer): integer;
     function AddCCFunc(ABus,BBus : integer): integer;
     function SRLFunc(ABus,BBus : integer): integer;
     function AndFunc(ABus,BBus : integer): integer;
     function OrFunc(ABus,BBus : integer): integer;
     function NorFunc(ABus,BBus : integer): integer;
     function AddFunc(ABus,BBus : integer): integer;
     function LShift2Func(ABus : integer): integer;
     function LShift10Func(ABus : integer): integer;
     function Simm13Func(ABus : integer): integer;
     function Sext13Func(ABus : integer): integer;
     function IncFunc(ABus : integer): integer;
     function IncPCFunc(ABus : integer): integer;
     function RShift5Func(ABus : integer): integer;
//end;
}
type
  TCPU = class(TForm)
    RegistersGroup: TGroupBox;
    Panel2: TPanel;
    Label9: TLabel;
    Label10: TLabel;
    Label11: TLabel;
    Label12: TLabel;
    Label13: TLabel;
    Label14: TLabel;
    Label15: TLabel;
    Label16: TLabel;
    r29: TEdit;
    r25: TEdit;
    r21: TEdit;
    r13: TEdit;
    r9: TEdit;
    r5: TEdit;
    r1: TEdit;
    r17: TEdit;
    Panel3: TPanel;
    Label17: TLabel;
    Label18: TLabel;
    Label19: TLabel;
    Label20: TLabel;
    Label21: TLabel;
    Label22: TLabel;
    Label23: TLabel;
    Label24: TLabel;
    r31: TEdit;
    r27: TEdit;
    r23: TEdit;
    r15: TEdit;
    r11: TEdit;
    r7: TEdit;
    r3: TEdit;
    r19: TEdit;
    Panel4: TPanel;
    Label25: TLabel;
    Label26: TLabel;
    Label27: TLabel;
    Label28: TLabel;
    Label29: TLabel;
    Label30: TLabel;
    Label31: TLabel;
    Label32: TLabel;
    r30: TEdit;
    r26: TEdit;
    r22: TEdit;
    r14: TEdit;
    r10: TEdit;
    r6: TEdit;
    r2: TEdit;
    r18: TEdit;
    Panel1: TPanel;
    Label8: TLabel;
    Label7: TLabel;
    Label4: TLabel;
    Label5: TLabel;
    Label6: TLabel;
    Label3: TLabel;
    Label2: TLabel;
    Label1: TLabel;
    r28: TEdit;
    r24: TEdit;
    r20: TEdit;
    r12: TEdit;
    r8: TEdit;
    r4: TEdit;
    r0: TEdit;
    r16: TEdit;
    Panel5: TPanel;
    LoadBtn: TButton;
    QuitBtn: TButton;
    HexOrDec: TRadioGroup;
    OpenDialog: TOpenDialog;
    PCBtn: TButton;
    ShowRegBtn: TButton;
    MemoryBtn: TButton;
    Panel6: TPanel;
    Label33: TLabel;
    PC: TEdit;
    Nrb: TRadioButton;
    Zrb: TRadioButton;
    Vrb: TRadioButton;
    Crb: TRadioButton;
    StepBtn: TButton;
    RunBtn: TButton;
    Memo: TMemo;
    procedure LoadBtnClick(Sender: TObject);
    procedure QuitBtnClick(Sender: TObject);
    procedure PCBtnClick(Sender: TObject);
    procedure ShowRegBtnClick(Sender: TObject);
    procedure HexOrDecClick(Sender: TObject);
    procedure MemoryBtnClick(Sender: TObject);
    procedure FormClose(Sender: TObject; var Action: TCloseAction);
    procedure StepBtnClick(Sender: TObject);
    procedure RunBtnClick(Sender: TObject);

  private
    MinorCyclesCount, MajorCyclesCount : integer;
    numWords : integer;  // the number of words loaded into memory
    Registers : array [0..37] of integer;
//    ABus : ShortInt; //Address supplied by CPU to memory for
    ABus : integer; //Address supplied by CPU to memory for
                     //read/write
    BBus, CBus : integer;
    PCAddress , StepCtr : Integer;
    Memory : TMemory;
    //Condition codes
    N,Z,C,V : boolean;
    //Decode vars
    op, op2, op3, cond, rs1, rs2, rd, i_bit,
    simm13, imm22, disp22, disp30, op_code : ShortInt;
    procedure Minor (ABus,BBus,CBus, aluFunc, memOp : integer);
    function Major : boolean;
    function Execute : boolean;
    procedure Fetch;
    procedure Decode;
    procedure Load;
    procedure UpdatePC;
//    procedure Memory;
    procedure ShowRegisters;
    procedure SetConditionCodes;
    function AndCCFunc(ABus,BBus : integer): integer;
    function OrCCFunc(ABus,BBus : integer): integer;
    function NorCCFunc(ABus,BBus : integer): integer;
    function AddCCFunc(ABus,BBus : integer): integer;
    function SRLFunc(ABus,BBus : integer): integer;
    function AndFunc(ABus,BBus : integer): integer;
    function OrFunc(ABus,BBus : integer): integer;
    function NorFunc(ABus,BBus : integer): integer;
    function AddFunc(ABus,BBus : integer): integer;
    function LShift2Func(ABus : integer): integer;
    function LShift10Func(ABus : integer): integer;
    function Simm13Func(ABus : integer): integer;
    function Sext13Func(ABus : integer): integer;
    function IncFunc(ABus : integer): integer;
    function IncPCFunc(ABus : integer): integer;
    function RShift5Func(ABus : integer): integer;

    { Private declarations }
  public
    { Public declarations }
  end;

var
  CPU: TCPU;
  const
    NoOp = 0;
    Read = 1;
    Write = 2;
    AndCC = 0;
    OrCC = 1;
    NorCC = 2;
    AddCC = 3;
    SRL = 4;
    cAnd = 5; //and & or are reserved words
    cOr = 6;
    Nor = 7;
    Add = 8;
    LShift2 = 9;
    LShift10 = 10;
    Simm13 = 11;
    Sext13 = 12;
    Inc = 13;
    IncPC = 14;
    RShift5 = 15;

implementation

{$R *.DFM}
{*****************Begin Memory Class Functions**************}

constructor TMemory.Create;
begin
     LowAddress := 0;
     HighAddress := 0;
end;

destructor TMemory.Destroy;
begin
     inherited Destroy;
end;
//reads a byte(8 bit) address and returns a 32 bit data value
//function TMemory.Read(address : ShortInt) : integer;
function TMemory.Read(address : integer) : integer;
begin
//
end;

//writes a 32 bit value to the 8 bit address
//procedure TMemory.Write( value : integer; address : ShortInt);
procedure TMemory.Write( value : integer; address : integer);
begin
     Memory[address] := value;
end;

{*****************End Memory Class Functions**************}

{*****************Begin ALU Class Functions**************}

{function TALU.AndCCFunc(ABus,BBus : integer): integer;
begin

end;

function TALU.OrCCFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.NorCCFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.AddCCFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.SRLFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.AndFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.OrFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.NorFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.AddFunc(ABus,BBus : integer): integer;
begin
end;

function TALU.LShift2(ABus : integer): integer;
begin
end;

function TALU.LShift10(ABus : integer): integer;
begin
end;

function TALU.Simm13(ABus : integer): integer;
begin
end;

function TALU.Sext13(ABus : integer): integer;
begin
end;

function TALU.Inc(ABus : integer): integer;
begin
end;

function TALU.IncPC(ABus : integer): integer;
begin
end;

function TALU.RShift5(ABus : integer): integer;
begin
end;
 }
{*****************End ALU Class Functions**************}

function TCPU.AndCCFunc(ABus,BBus : integer): integer;
begin

end;

function TCPU.OrCCFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.NorCCFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.AddCCFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.SRLFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.AndFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.OrFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.NorFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.AddFunc(ABus,BBus : integer): integer;
begin
end;

function TCPU.LShift2Func(ABus : integer): integer;
begin
end;

function TCPU.LShift10Func(ABus : integer): integer;
begin
end;

function TCPU.Simm13Func(ABus : integer): integer;
begin
end;

function TCPU.Sext13Func(ABus : integer): integer;
begin
end;

function TCPU.IncFunc(ABus : integer): integer;
begin
end;

function TCPU.IncPCFunc(ABus : integer): integer;
begin
end;

function TCPU.RShift5Func(ABus : integer): integer;
begin
end;


procedure TCPU.LoadBtnClick(Sender: TObject);
    //*****this is an incorrect file format!!!
   //removes unwanted data from the line
   //because the bin file format is, eg.:
   //0: 30 30 38....etc
   function getLine(line : string) : string;
   var
     p : integer;
   begin
        if ( pos(':', line) <> 0 )then
           p := pos(':', line) + 1
        else
           p := 0;
        getLine := trim(copy(line,p,length(line)-1));
   end;

   function getAddress(var line : string) : string;
   var
     count : integer;
     address : string;
   begin
        address := '';
        count := 0;
        while (count < 8) do
        begin
          address := address+ copy(line,0,(pos(' ',line)-1));
          line := trim(copy(line,pos(' ',line),length(line)-1));
          count := count + 1;
        end;
        line := address+line;
        getAddress := address;
   end;

   function getValue(offset: integer; line : string) : string;
   var
     value : string;
     count : integer;
   begin
     value := '';
     count := 0;
     line := copy(line,offset,length(line)-1);
     while (count < 8) do
     begin
       value := value + copy(line,0,(pos(' ',line)-1));
       line := trim(copy(line,pos(' ',line),length(line)-1));
       count := count + 1;
     end;
     getValue := value;

   end;
var
  BinFile : TextFile;
  line, address : string;
  loadInfo: TStringList;
  value, offset : integer;
begin
     RegistersGroup.Visible := false;
     Memo.Visible := false;
     StepCtr := 0;
     if OpenDialog.Execute then //get file
     begin
       //reset counts
       MajorCyclesCount := 0;
       MinorCyclesCount := 0;
       Memory := TMemory.Create;
       AssignFile(BinFile,OpenDialog.FileName);
       Reset(BinFile); //open file and position cursor at the BOF file
       numWords := 0;
       //load into memory line by line
       while not SeekEOF(BinFile) do
       begin
         //Readln positions cursor at the BOF the next line
         //after reading the line
         Readln(BinFile, line);{ Read the first line out of the file }
         line := getLine(line);
         address := getAddress(line);
//         address := numWords;//??
         //write to memory
         offset := length(address) + 1;
         value := integer(getValue(offset,line));
         Memory.Write(value,integer(address));
         //*******check we don't exceed 100 lines
         Memory.HighAddress := Memory.HighAddress + 4;
         //Memory.HighAddress := numWords;????
         numWords := numWords + 1;
       end;

       CloseFile(BinFile);
       loadInfo := TStringList.Create;
       try
         loadInfo.Add(IntToStr(numWords)); //number of memory words
         loadInfo.Add(' memory words were loaded into memory. ');
         loadInfo.Add('Filename: ');
         loadInfo.Add(''); //filename
         loadInfo.Add('The lowest memory address location was: ');
         loadInfo.Add('');//lowest memory address
         loadInfo.Add('The highest memory address location was: ');
         loadInfo.Add('');//highest memory address
//         showmessage(loadInfo.it );
       finally
         loadInfo.Free;
       end;
     end;

end;

procedure TCPU.QuitBtnClick(Sender: TObject);
begin
     RegistersGroup.Visible := false;
     Memo.Visible := false;
     Memo.Visible := false;
     Memo.Visible := false;
     showmessage('There were '+IntToStr(MajorCyclesCount)+
                 ' major cycles and '+IntToStr(MinorCyclesCount)+
                 ' minor cycles');
     Close;
end;

procedure TCPU.Minor (ABus,BBus,CBus, aluFunc, memOp : integer);
  function CheckValidParams : boolean;
  begin
    CheckValidParams := false;
    if ((ABus < 0) or (ABus > 37)) then
    begin
      showmessage('Invalid A Bus register! Reg #:'+IntToStr(ABus));
      exit;
    end;
    if ((BBus < 0) or (BBus > 37)) then
    begin
      showmessage('Invalid B Bus register! Reg #:'+IntToStr(BBus));
      exit;
    end;
    if ((CBus < 0) or (CBus > 37)) then
    begin
        showmessage('Invalid C Bus register! Reg #:'+IntToStr(CBus));
        exit;
    end;
    if ((aluFunc < 0) or (aluFunc > 15)) then
    begin
        showmessage('Invalid ALU function! Function #:'+IntToStr(aluFunc));
        exit;
    end;
    if ((memOp < 0) or (memOp > 15)) then
    begin
        showmessage('Invalid Memory operation! Memory operation #:'+IntToStr(memOp));
        exit;
    end;
    CheckValidParams := true;
  end;
var
  ALUResult : integer;
begin
     if (CheckValidParams = true) then
     begin
       //compute ALU result
       ALUResult := 0;
       case aluFunc of
         AndCC: ALUResult := AndCCFunc(ABus,BBus);
         OrCC: ALUResult := OrCCFunc(ABus,BBus);
         NorCC: ALUResult := NorCCFunc(ABus,BBus);
         AddCC: ALUResult := AddCCFunc(ABus,BBus);
         SRL: ALUResult := SRLFunc(ABus,BBus);
         cAnd: ALUResult := AndFunc(ABus,BBus);
         cOr: ALUResult := OrFunc(ABus,BBus);
         Nor: ALUResult := NorFunc(ABus,BBus);
         Add: ALUResult := AddFunc(ABus,BBus);
         LShift2: ALUResult := LShift2Func(ABus);
         LShift10: ALUResult := LShift10Func(ABus);
//         Simm13: ALUResult := Simm13Func(ABus);
         Sext13: ALUResult := Sext13Func(ABus);
         Inc: ALUResult := IncFunc(ABus);
         IncPC: ALUResult := IncPCFunc(ABus);
         RShift5: ALUResult := RShift5Func(ABus);
       end;
       case memOp of
       Read: CBus := Memory.Read(ABus);
       Write: Memory.Write(ABus, BBus);
       NoOp: CBus := ALUResult;
       end;
     end;
     MinorCyclesCount := MinorCyclesCount +1;
end;


//Major -
//Implements the processor's fetch-execute cycle
//Fetches and executes a single ISA level (machine language)
//instruction.
//Executes one instruction and requires one
//or more minor cucles to complete.
//returns true if an instruction executed successfully
//returns false if the op code was invalid, nop or halt
function TCPU.Major : boolean;
begin
     major := false;
     fetch;
     decode;
     if Execute = true then
     begin
       updatePC;
       MajorCyclesCount := MajorCyclesCount + 1 ;
       major := true;
     end;
end;

procedure TCPU.Fetch;
begin
     //reg 37 - the Instruction Register
     //holds the 32 bit instruction being executed
     Registers[37] := Memory.Read(Registers[32]);
     ABus := Registers[32];
     BBus := Registers[0];
     CBus := Registers[37];
     Minor(ABus,BBus,CBus, cAND, Read);
end;

procedure TCPU.Decode;
var
 IR : integer;
begin
     IR := registers[37];
     op := ((IR shr 30) and 11);
     op2 := ((IR shr 22) and 111);
     if ((op = 10) or (op = 11))then
        op3 := ((IR shr 19) and 111111)
     else
        op3 := 0; //unused

     //branch condition
     if (((IR shr 29) and 111) = 000 )then
         cond := ((IR shr 25) and 1111)
     else
         cond := 0; //unused

     if ((op = 10) or (op = 11)) then
     begin
        i_bit := ((IR shr 13) and 1);
        rs1 := ((IR shr 14) and 11111)
     end;

     if (((op = 10) or (op = 11)) and (i_bit = 0)) then
        rs2 := IR and 11111;

     if (((op = 10) or (op = 11)) and (i_bit = 1)) then
         simm13 := IR and 111111111111;
     if (cond <> 0) and (op <> 01) then //not a branch instruction
        rd := ((IR shr 25) and 11111);
{     if ((op = 00) and (cond = 0)) then
        imm22 := (IR and 111111111111111111111);
     if ((op = 00) and (cond <> 0))
        disp22 := (IR and 111111111111111111111);
     if op = 01 then
        disp30 := (IR and 111111111111111111111111111111);}
end;

procedure TCPU.Load;
begin
//
end;

procedure TCPU.UpdatePC;
begin
//
end;

{
  Registers 0-31 are general purpose.

  Register 32 is the Program Counter.

  Registers 33-36 are temporary registers for
  use by the control unit

  Register 37 is the Instruction Register which holds
  the 32 bit instruction being executed.
}

procedure TCPU.ShowRegisters;
begin
     r0.Text := '00000000'; //never change Reg # 0
     //set condition codes on display
     if N = true then
        Nrb.Checked
     else
        Nrb.Checked := False;
     if Z = true then
        Zrb.Checked
     else
         Zrb.Checked := false;
     if C = true then
        Crb.Checked
     else
         Crb.Checked := false;
     if V = true then
        Vrb.Checked
     else
         Vrb.Checked := false;

     case HexOrDec.ItemIndex of
     0:  begin
           r1.Text := IntToHex(Registers[1],8);
           r2.Text := IntToHex(Registers[2],8);
           r3.Text := IntToHex(Registers[3],8);
           r4.Text := IntToHex(Registers[4],8);
           r5.Text := IntToHex(Registers[5],8);
           r6.Text := IntToHex(Registers[6],8);
           r7.Text := IntToHex(Registers[7],8);
           r8.Text := IntToHex(Registers[8],8);
           r9.Text := IntToHex(Registers[9],8);
           r10.Text := IntToHex(Registers[10],8);
           r11.Text := IntToHex(Registers[11],8);
           r12.Text := IntToHex(Registers[12],8);
           r13.Text := IntToHex(Registers[13],8);
           r14.Text := IntToHex(Registers[14],8);
           r15.Text := IntToHex(Registers[15],8);
           r16.Text := IntToHex(Registers[16],8);
           r17.Text := IntToHex(Registers[17],8);
           r18.Text := IntToHex(Registers[18],8);
           r19.Text := IntToHex(Registers[19],8);
           r20.Text := IntToHex(Registers[20],8);
           r21.Text := IntToHex(Registers[21],8);
           r22.Text := IntToHex(Registers[22],8);
           r23.Text := IntToHex(Registers[23],8);
           r24.Text := IntToHex(Registers[24],8);
           r25.Text := IntToHex(Registers[25],8);
           r26.Text := IntToHex(Registers[26],8);
           r27.Text := IntToHex(Registers[27],8);
           r28.Text := IntToHex(Registers[28],8);
           r29.Text := IntToHex(Registers[29],8);
           r30.Text := IntToHex(Registers[30],8);
           r31.Text := IntToHex(Registers[31],8);
           PC.Text := IntToHex(Registers[32],8);
         end;
     1:  begin
//           r0.Text := IntToStr(Registers[0]);
           r1.Text := IntToStr(Registers[1]);
           r2.Text := IntToStr(Registers[2]);
           r3.Text := IntToStr(Registers[3]);
           r4.Text := IntToStr(Registers[4]);
           r5.Text := IntToStr(Registers[5]);
           r6.Text := IntToStr(Registers[6]);
           r7.Text := IntToStr(Registers[7]);
           r8.Text := IntToStr(Registers[8]);
           r9.Text := IntToStr(Registers[9]);
           r10.Text := IntToStr(Registers[10]);
           r11.Text := IntToStr(Registers[11]);
           r12.Text := IntToStr(Registers[12]);
           r13.Text := IntToStr(Registers[13]);
           r14.Text := IntToStr(Registers[14]);
           r15.Text := IntToStr(Registers[15]);
           r16.Text := IntToStr(Registers[16]);
           r17.Text := IntToStr(Registers[17]);
           r18.Text := IntToStr(Registers[18]);
           r19.Text := IntToStr(Registers[19]);
           r2.Text := IntToStr(Registers[20]);
           r21.Text := IntToStr(Registers[21]);
           r22.Text := IntToStr(Registers[22]);
           r23.Text := IntToStr(Registers[23]);
           r24.Text := IntToStr(Registers[24]);
           r25.Text := IntToStr(Registers[25]);
           r26.Text := IntToStr(Registers[26]);
           r27.Text := IntToStr(Registers[27]);
           r28.Text := IntToStr(Registers[28]);
           r29.Text := IntToStr(Registers[29]);
           r3.Text := IntToStr(Registers[30]);
           r31.Text := IntToStr(Registers[31]);
           PC.Text := IntToStr(Registers[32]);
         end;
     end;
     RegistersGroup.Visible := true;
end;

{procedure TCPU.Memory;
begin
//
end;
 }
procedure TCPU.PCBtnClick(Sender: TObject);
var
 input : string;
begin
     RegistersGroup.Visible := false;
     Memo.Visible := false;
     StepCtr := 0;
//CHECK FOR HEX OR DEC???
     try
       input := InputBox('Enter the address for the location of the program''s first instruction in memory.',
                                  'PC Address:','');
       if input <> '' then
          PCAddress := StrToInt(input);
     except
        Showmessage('Invalid input');
        exit;
     end;
     Showmessage('The old value of the PC was: '+IntToStr(Registers[32])
                      + ' and the new value is: '+ IntToStr(PCAddress));                                  
     Registers[32] := PCAddress;
end;

procedure TCPU.ShowRegBtnClick(Sender: TObject);
begin
     Memo.Visible := false;
     StepCtr := 0;
     ShowRegisters;
end;

procedure TCPU.HexOrDecClick(Sender: TObject);
begin
     ShowRegisters;
end;

//Displays the contents of the memory locations from
//first to last
procedure TCPU.MemoryBtnClick(Sender: TObject);
   procedure ShowMemory;
   begin
      //find the from memory location
      //until the to memory location
      //get the words
      //output in hex to Memo
      Memo.Clear;
      Memo.Visible := true;
   end;
var
  FromAdr, ToAdr : integer;
  input : string;
begin
     RegistersGroup.Visible := false;
     StepCtr := 0;
     try
     input := InputBox('Enter the ''From'' address', 'From Address:', '');
     if input <> '' then
        FromAdr := StrToInt(input);
     input := InputBox('Enter the ''To'' address', 'To Address:', '');
     if input <> '' then
        ToAdr := StrToInt(input);
     except
       showmessage('Invalid input!');
       exit;
     end;
     ShowMemory;
end;

procedure TCPU.FormClose(Sender: TObject; var Action: TCloseAction);
begin
     if Memory <> nil then
        Memory.Free;
end;

procedure TCPU.StepBtnClick(Sender: TObject);
begin
     RegistersGroup.Visible := false;
     Memo.Visible := false;
     Memo.Visible := false;
     Memo.Visible := false;
//     Memory.Read(address at StepCtr )
{     begin
       Fetch;
       Decode;
       Execute;
     end;
     StepCtr := StepCtr + 1;
 }
end;

procedure TCPU.RunBtnClick(Sender: TObject);
var
  i : integer;
begin
     RegistersGroup.Visible := false;
     Memo.Visible := false;
     Memo.Visible := false;
     Memo.Visible := false;
     StepCtr := 0;
  {   for i := 0 to 99 do //99 due to default mem size of 100
     begin
       Fetch;
       Decode;
       Execute;
     end;   }
     showmessage('There were '+IntToStr(MajorCyclesCount)+
                 ' major cycles and '+IntToStr(MinorCyclesCount)+
                 ' minor cycles');

end;

procedure TCPU.SetConditionCodes;
begin
{    N :=
    Z :=
    C :=
    V :=}
end;

function TCPU.Execute : boolean;
begin
//
end;

end.
