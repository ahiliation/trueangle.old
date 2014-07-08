---
layout: post
title: "tracing, bit manipulation without branching"
date: 2014-07-08 13:07:31 +0000
comments: true
categories: 
---

<pre>
Breakpoint 1, main () at set-or-clear-bits-without-branching.c:11
11	   printf("Enter the word to modify ");
(gdb) next
12    scanf("%u",&w);
(gdb) next
Enter the word to modify 6
14     printf("Enter the bit mask ");
(gdb) next
15     scanf("%u",&m);
(gdb) next
Enter the bit mask 3
21    w = (w & ~m) | (-f & m); 
(gdb) print w
$1 = 6
(gdb) print m
$2 = 3
(gdb) print ~m
$3 = 4294967292
(gdb) print *~m
Cannot access memory at address 0xfffffffc
(gdb) print ~m
$4 = 4294967292
(gdb) print f
$5 = 0
(gdb) print -f
$6 = 0
(gdb) print +f
$7 = 0
(gdb) print -f
$8 = 0
(gdb) print (w & ~m)
$9 = 4
(gdb) p/t (w & ~m)
$10 = 100
(gdb) p/t w
$11 = 110
(gdb) p/t m
$12 = 11
(gdb) p/t ~m
$13 = 11111111111111111111111111111100
(gdb) p/t (w & ~m)
$14 = 100
(gdb) print w
$15 = 6
(gdb) p/t 6
$16 = 110
(gdb) p/t 4
$17 = 100
(gdb) p/t (-f & m)
$18 = 0
(gdb) p/t -f
$19 = 0
(gdb) p/t m
$20 = 11
(gdb) next
23    printf("Modified value is %u \n",w);
(gdb) next
Modified value is 4 
25	  return 0;
(gdb) next
26    }
(gdb) next
__libc_start_main (main=0x40056d <main>, argc=1, argv=0x7fffffffe2c8, init=<optimized out>, 
    fini=<optimized out>, rtld_fini=<optimized out>, stack_end=0x7fffffffe2b8) at libc-start.c:321
321 libc-start.c: No such file or directory.
(gdb) next
[Inferior 1 (process 5753) exited normally]
(gdb) 
</pre>