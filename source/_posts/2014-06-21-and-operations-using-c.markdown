---
layout: post
title: "AND operations using C"
date: 2014-06-21 13:35:33 +0000
comments: true
categories: 
---


<pre>
Breakpoint 1, main () at and-p2.c:5
5	  int val1 = 4;
(gdb) next
6	  int val2 = 0;
(gdb) next
8	  if ( val1 & val2)
(gdb) print val1
$1 = 4
(gdb) print val2
$2 = 0
(gdb) print (val1 & val2)
$3 = 0
(gdb) print (3 & 1)
$4 = 1
(gdb) next
11	  if ( val1 && val2 )
(gdb) print (val1 && val2)
$5 = 0
(gdb) next
13	}
(gdb) next
__libc_start_main (main=0x4004fd <main>, argc=1, argv=0x7fffffffe328, init=<optimized out>, 
    fini=<optimized out>, rtld_fini=<optimized out>, stack_end=0x7fffffffe318) at libc-start.c:321
321	libc-start.c: No such file or directory.
(gdb) next
[Inferior 1 (process 5234) exited normally]
(gdb) quit
$

</pre>