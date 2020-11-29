
Here is a gdb session that shows how to use watch points in
gdb.  The program just puts ascii nuls into each byte of a
string, starting at the end.  The command "watch a[6]" tells
gdb to tell me whenever a[6] changes value.  After setting
the watch point, I typed the c command to continue execion,
and the program ran at full speed as a[15] ... a[7] were
changed, but as soon as a[6] changed, gdb stopped the
program so I could enter other debugging commands.  You can
save a lot of debugging time by using watchpoints.

"Full speed" is a relative term here.  On a PC (running
Linux) the Intel Architecture has a hardware facility for
detecting watchpoints, but I'm not sure about forbin; the
code seemed to run more slowly while the watchpoint was in
place, so you might need to be judicious in your use of them
on that platform.
Dr. Vickery

Breakpoint 1, main () at watch.cc:2
2 char a[]="abcdefghijklmnop";
(gdb) l
1 int main(){
2 char a[]="abcdefghijklmnop";
3 for(int i=15; i>=0; i--)
4  a[i]='\0';
5 return 0;
6 }
(gdb) n
3 for(int i=15; i>=0; i--)
(gdb) watch a[6]
Hardware watchpoint 4: a[6]
(gdb) c
Continuing.
Hardware watchpoint 4: a[6]

Old value = 103 'g'
New value = 0 '\000'
0x8048502 in main () at watch.cc:4
4  a[i]='\0';
(gdb)  

