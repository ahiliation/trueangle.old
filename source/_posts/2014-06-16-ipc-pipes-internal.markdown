---
layout: post
title: "IPC pipes internal"
date: 2014-06-16 18:26:40 +0000
comments: true
categories: 
---

<pre>
Breakpoint 1, main () at popen1-p1.c:10
10	  memset(buffer,'\0',sizeof(buffer));
(gdb) next
11	  read_fp = popen("uname -a","r");
(gdb) print read_fp
$1 = (FILE *) 0x0
(gdb) next
12	  if (read_fp != NULL)
(gdb) print read_fp
$2 = (FILE *) 0x601010
(gdb) print (char *)read_fp
$3 = 0x601010 "\210$\255", <incomplete sequence \373>
(gdb) next
14	      chars_read = fread(buffer,sizeof(char),BUFSIZ,read_fp);
(gdb) print chars_read
$4 = 32767
(gdb) next
15	      if (chars_read > 0) {
(gdb) print chars_read
$5 = 79
(gdb) next
16		printf("Output was:- \n%s\n",buffer);
(gdb) next
Output was:- 
Linux debian 3.12-1-amd64 #1 SMP Debian 3.12.9-1 (2014-02-01) x86_64 GNU/Linux

18	      pclose(read_fp);
(gdb) next
19	      exit(EXIT_SUCCESS);
(gdb) next
[Inferior 1 (process 5508) exited normally]
(gdb) 

</pre>