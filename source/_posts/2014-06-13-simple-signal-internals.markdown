---
layout: post
title: "simple signal internals"
date: 2014-06-13 15:55:33 +0000
comments: true
categories: 
---

<pre>
Reading symbols from /home/jeffrin/beautifulwork-programmingpractice/processes-and-signals/a.out...done.
(gdb) break 1
Breakpoint 1 at 0x4005d8: file crtlc1-p1.c, line 1.
(gdb) r
Starting program: /home/jeffrin/beautifulwork-programmingpractice/processes-and-signals/a.out 
warning: Could not load shared library symbols for linux-vdso.so.1.
Do you need "set solib-search-path" or "set sysroot"?
Hello world 
Hello world 
Hello world 
Hello world 
^C
Program received signal SIGINT, Interrupt.
0x00007ffff7aeb080 in __nanosleep_nocancel () at ../sysdeps/unix/syscall-template.S:81
81	../sysdeps/unix/syscall-template.S: No such file or directory.
(gdb) l
76	in ../sysdeps/unix/syscall-template.S
(gdb) l
76	in ../sysdeps/unix/syscall-template.S
(gdb) next
__sleep (seconds=0) at ../sysdeps/unix/sysv/linux/sleep.c:142
142	../sysdeps/unix/sysv/linux/sleep.c: No such file or directory.
(gdb) next
55	in ../sysdeps/unix/sysv/linux/sleep.c
(gdb) next
147	in ../sysdeps/unix/sysv/linux/sleep.c
(gdb) next
main () at crtlc1-p1.c:21
21	    }
(gdb) next
19	      printf("Hello world \n");
(gdb) next
Hello world 
20	      sleep(1);
(gdb) next
21	    }
(gdb) next
19	      printf("Hello world \n");
(gdb) next
Hello world 
20	      sleep(1);
(gdb) next
21	    }
(gdb) next
19	      printf("Hello world \n");
(gdb) signal SIGINT
Continuing with signal SIGINT.

Breakpoint 1, ouch (sig=2) at crtlc1-p1.c:8
8	  printf("i got a signal %d\n",sig);
(gdb) next
i got a signal 2
9	  (void) signal(SIGINT, SIG_DFL);
(gdb) next
10	}
(gdb) next
main () at crtlc1-p1.c:19
19	      printf("Hello world \n");
(gdb) next
Hello world 
20	      sleep(1);
(gdb) next
21	    }
(gdb) signal SIGINT
Continuing with signal SIGINT.

Program terminated with signal SIGINT, Interrupt.
The program no longer exists.
(gdb) 



</pre>
