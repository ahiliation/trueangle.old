---
layout: post
title: "internals of armstrong number finding algorithm"
date: 2014-08-12 15:04:26 +0000
comments: true
categories: 
---

<pre>
Reading symbols from ./app...done.
(gdb) break
break        break-range  
(gdb) break armstrong
armstrong          armstrong@got.plt  armstrong@plt      
(gdb) break armstrong
Breakpoint 1 at 0x4007f0
(gdb) call armstrong()
You can't do that without a process to debug.
(gdb) break 1
Breakpoint 2 at 0x40092e: file main.c, line 1.
(gdb) r
Starting program: /home/jeffrin/libeautifulwork/app 

Breakpoint 2, main () at main.c:16
16	  printf("Sign detection [1] \n");
(gdb) break armstrong-number.c:1 
Note: breakpoint 1 also set at pc 0x7ffff7bdade1.
Breakpoint 3 at 0x7ffff7bdade1: file armstrong-number.c, line 1.
(gdb) call armstrong()

Breakpoint 1, armstrong () at armstrong-number.c:13
13	  int n, n1, rem, num=0;
The program being debugged stopped while in a function called from GDB.
Evaluation of the expression containing the function
(armstrong) will be abandoned.
When the function is done executing, GDB will silently stop.
(gdb) l
8	#include <stdio.h>
9	
10	armstrong()
11	{
12	
13	  int n, n1, rem, num=0;
14	  printf("Enter a positive integer: ");
15	  scanf("%d",&n);
16	  n1 = n;
17	
(gdb) next
14	  printf("Enter a positive integer: ");
(gdb) next
15	  scanf("%d",&n);
(gdb) next
Enter a positive integer: 153
16	  n1 = n;
(gdb) print n1
$1 = 0
(gdb) next
18	  while ( n1 != 0 )
(gdb) print n1
$2 = 153
(gdb) next
20	      rem = n1 % 10;
(gdb) next
21	      num+= rem * rem * rem;
(gdb) print n1
$3 = 153
(gdb) print rem
$4 = 3
(gdb) next
22	      n1/= 10;
(gdb) print n1
$5 = 153
(gdb) next
18	  while ( n1 != 0 )
(gdb) print n1
$6 = 15
(gdb) next
20	      rem = n1 % 10;
(gdb) next
21	      num+= rem * rem * rem;
(gdb) print n1
$7 = 15
(gdb) print rem
$8 = 5
(gdb) next
22	      n1/= 10;
(gdb) next
18	  while ( n1 != 0 )
(gdb) print n1
$9 = 1
(gdb) next
20	      rem = n1 % 10;
(gdb) next
21	      num+= rem * rem * rem;
(gdb) print rem
$10 = 1
(gdb) next
22	      n1/= 10;
(gdb) next
18	  while ( n1 != 0 )
(gdb) print n1
$11 = 0
(gdb) next
24	  if (num == n)
(gdb) next
25	    printf("%d is an Armstrong number \n",n);
(gdb) next
153 is an Armstrong number 
28	}
(gdb) next
(gdb) next
Sign detection [1] 
17	  printf("Power of two [2] \n");
(gdb) quit
A debugging session is active.

	Inferior 1 [process 2631] will be killed.

Quit anyway? (y or n) y
$

</pre>