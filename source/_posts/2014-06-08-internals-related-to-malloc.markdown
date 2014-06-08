---
layout: post
title: "Internals related to malloc"
date: 2014-06-08 15:34:49 +0000
comments: true
categories: 
---

<pre>

Breakpoint 1, main () at memory1-p1.c:9
9	  int megabyte = A_MEGABYTE;
(gdb) next
10	  int exit_code = EXIT_FAILURE;
(gdb) print EXIT_FAILURE
No symbol "EXIT_FAILURE" in current context.
(gdb) printf EXIT_FAILURE
Bad format string, missing '"'.
(gdb) print exit_code
$1 = 0
(gdb) next
12	  some_memory = (char *)malloc(megabyte);
(gdb) next
13	  if (some_memory != NULL) {
(gdb) print some_memory
$2 = 0x7ffff7eda010 ""
(gdb) next
14	    sprintf(some_memory,"Hello World\n");
(gdb) print some_memory
$3 = 0x7ffff7eda010 ""
(gdb) next
15	    printf("%s",some_memory);
(gdb) print some_memory
$4 = 0x7ffff7eda010 "Hello World\n"
(gdb) next
Hello World
16	    exit_code = EXIT_SUCCESS;
(gdb) print exit_code
$5 = 1
(gdb) next
18	  exit(exit_code);
(gdb) next
[Inferior 1 (process 4249) exited normally]
(gdb) print exit_code
No symbol "exit_code" in current context.
(gdb) 

</pre>