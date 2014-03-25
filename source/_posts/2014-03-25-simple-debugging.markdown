---
layout: post
title: "simple debugging"
date: 2014-03-25 18:07:32 +0000
comments: true
categories: 
---
<pre>

$gdb bubblesort 
GNU gdb (GDB) 7.6.2 (Debian 7.6.2-1)
Copyright (C) 2013 Free Software Foundation, Inc.
License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>
This is free software: you are free to change and redistribute it.
There is NO WARRANTY, to the extent permitted by law.  Type "show copying"
and "show warranty" for details.
This GDB was configured as "x86_64-linux-gnu".
For bug reporting instructions, please see:
<http://www.gnu.org/software/gdb/bugs/>...
Reading symbols from /home/jeffrin/beautifulwork-sorting/gnu-c/bubblesort...done.
(gdb) break 1
Breakpoint 1 at 0x400508: file bubblesort.c, line 1.
(gdb) r
Starting program: /home/jeffrin/beautifulwork-sorting/gnu-c/bubblesort 
warning: no loadable sections found in added symbol-file system-supplied DSO at 0x7ffff7ffa000
warning: Could not load shared library symbols for linux-vdso.so.1.
Do you need "set solib-search-path" or "set sysroot"?

Breakpoint 1, main () at bubblesort.c:17
17	  int array_size=400;
(gdb) next
20	  for(x = 0; x < array_size; x++)
(gdb) next
21	  ran[x]= rand();
(gdb) print x
$1 = 0
(gdb) next
20	  for(x = 0; x < array_size; x++)
(gdb) next
21	  ran[x]= rand();
(gdb) print x
$2 = 1
(gdb) array_size=3
Undefined command: "array_size".  Try "help".
(gdb) let array_size=3
Undefined command: "let".  Try "help".
(gdb) set array_size=3
(gdb) next
20	  for(x = 0; x < array_size; x++)
(gdb) print x
$3 = 1
(gdb) next
21	  ran[x]= rand();
(gdb) print x
$4 = 2
(gdb) next
20	  for(x = 0; x < array_size; x++)
(gdb) print x
$5 = 2
(gdb) next
23	  for(x = 0; x < array_size; x++) {
(gdb) print x
$6 = 3
(gdb) next
24	    for(y = 0; y < array_size; y++) {
(gdb) quit
A debugging session is active.

	Inferior 1 [process 4064] will be killed.

Quit anyway? (y or n) y
$

</pre>