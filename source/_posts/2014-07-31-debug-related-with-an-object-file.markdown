---
layout: post
title: "debug related with an object file"
date: 2014-07-31 16:50:20 +0000
comments: true
categories: 
---

<pre>
(gdb) file set-or-clear-bits-without-branching.o 
Reading symbols from set-or-clear-bits-without-branching.o...done.
(gdb) info file
Symbols from "/home/jeffrin/libeautifulwork/set-or-clear-bits-without-branching.o".
Local exec file:
	`/home/jeffrin/libeautifulwork/set-or-clear-bits-without-branching.o', file type elf64-x86-64.
	Entry point: 0x0
	0x0000000000000000 - 0x0000000000000085 is .text
	0x0000000000000085 - 0x0000000000000085 is .data
	0x0000000000000085 - 0x0000000000000085 is .bss
	0x0000000000000085 - 0x00000000000000cd is .rodata
	0x00000000000000d0 - 0x0000000000000108 is .eh_frame
(gdb) l
1	#include <stdio.h>
2	
3	socbwb ()
4	{
5	  typedef int bool;
6	  bool f; /* conditional flag */
7	  unsigned int m; /* the bit mask */
8	  unsigned int w; /* the word to modify: if (f) w |= m; else w &= ~m; */
9	
10	  printf("Enter the word to modify ");
(gdb) print f
No symbol "f" in current context.
(gdb) info functions
All defined functions:

File set-or-clear-bits-without-branching.c:
int socbwb();
(gdb) info variables
All defined variables:
(gdb) whatis f
No symbol "f" in current context.
(gdb) info source
Current source file is set-or-clear-bits-without-branching.c
Compilation directory is /home/jeffrin/libeautifulwork
Located in /home/jeffrin/libeautifulwork/set-or-clear-bits-without-branching.c
Contains 24 lines.
Source language is c.
Compiled with DWARF 2 debugging format.
Does not include preprocessor macro info.
(gdb) info functions
All defined functions:

File set-or-clear-bits-without-branching.c:
int socbwb();
(gdb) disassemble 
No frame selected.
(gdb) disassemble socbwb
Dump of assembler code for function socbwb:
   0x0000000000000000 <+0>:	push   %rbp
   0x0000000000000001 <+1>:	mov    %rsp,%rbp
   0x0000000000000004 <+4>:	sub    $0x10,%rsp
   0x0000000000000008 <+8>:	mov    $0x0,%edi
   0x000000000000000d <+13>:	mov    $0x0,%eax
   0x0000000000000012 <+18>:	callq  0x17 <socbwb+23>
   0x0000000000000017 <+23>:	lea    -0xc(%rbp),%rax
   0x000000000000001b <+27>:	mov    %rax,%rsi
   0x000000000000001e <+30>:	mov    $0x0,%edi
   0x0000000000000023 <+35>:	mov    $0x0,%eax
   0x0000000000000028 <+40>:	callq  0x2d <socbwb+45>
   0x000000000000002d <+45>:	mov    $0x0,%edi
   0x0000000000000032 <+50>:	mov    $0x0,%eax
   0x0000000000000037 <+55>:	callq  0x3c <socbwb+60>
   0x000000000000003c <+60>:	lea    -0x8(%rbp),%rax
   0x0000000000000040 <+64>:	mov    %rax,%rsi
   0x0000000000000043 <+67>:	mov    $0x0,%edi
   0x0000000000000048 <+72>:	mov    $0x0,%eax
   0x000000000000004d <+77>:	callq  0x52 <socbwb+82>
   0x0000000000000052 <+82>:	mov    -0x8(%rbp),%eax
   0x0000000000000055 <+85>:	not    %eax
   0x0000000000000057 <+87>:	mov    %eax,%edx
   0x0000000000000059 <+89>:	mov    -0xc(%rbp),%eax
   0x000000000000005c <+92>:	and    %eax,%edx
   0x000000000000005e <+94>:	mov    -0x4(%rbp),%eax
   0x0000000000000061 <+97>:	neg    %eax
   0x0000000000000063 <+99>:	mov    %eax,%ecx
   0x0000000000000065 <+101>:	mov    -0x8(%rbp),%eax
   0x0000000000000068 <+104>:	and    %ecx,%eax
   0x000000000000006a <+106>:	or     %edx,%eax
   0x000000000000006c <+108>:	mov    %eax,-0xc(%rbp)
---Type <return> to continue, or q <return> to quit---
   0x000000000000006f <+111>:	mov    -0xc(%rbp),%eax
   0x0000000000000072 <+114>:	mov    %eax,%esi
   0x0000000000000074 <+116>:	mov    $0x0,%edi
   0x0000000000000079 <+121>:	mov    $0x0,%eax
   0x000000000000007e <+126>:	callq  0x83 <socbwb+131>
   0x0000000000000083 <+131>:	leaveq 
   0x0000000000000084 <+132>:	retq   
End of assembler dump.
(gdb) 


</pre>