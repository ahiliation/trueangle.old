---
layout: post
title: "questioning popen function"
date: 2014-06-16 18:12:30 +0000
comments: true
categories: 
---

<pre>
Breakpoint 1, main () at popen1-p2.c:10
10	  memset(buffer,'\0',sizeof(buffer));
(gdb) next
11	  read_fp = popen("stat","r");
(gdb) print read_fp
$1 = (FILE *) 0x0
(gdb) next
12	  if (read_fp != NULL)
(gdb) stat: missing operand
Try 'stat --help' for more information.

14	      chars_read = fread(buffer,sizeof(char),BUFSIZ,read_fp);
(gdb) print read_fp
$2 = (FILE *) 0x601010
(gdb) print chars_read
$3 = 32767
(gdb) next
15	      if (chars_read > 0) {
(gdb) next
18	      pclose(read_fp);
(gdb) print chars_read
$4 = 0
(gdb) print *read_fp
$5 = {_flags = -72538984, _IO_read_ptr = 0x7ffff7ff7000 "", _IO_read_end = 0x7ffff7ff7000 "", 
  _IO_read_base = 0x7ffff7ff7000 "", _IO_write_base = 0x7ffff7ff7000 "", _IO_write_ptr = 0x7ffff7ff7000 "", 
  _IO_write_end = 0x7ffff7ff7000 "", _IO_buf_base = 0x7ffff7ff7000 "", 
  _IO_buf_end = 0x7ffff7ff8000 "P\200\377\367\377\177", _IO_save_base = 0x0, _IO_backup_base = 0x0, 
  _IO_save_end = 0x0, _markers = 0x0, _chain = 0x7ffff7dd8060 <_IO_2_1_stderr_>, _fileno = 7, _flags2 = 0, 
  _old_offset = 0, _cur_column = 0, _vtable_offset = 0 '\000', _shortbuf = "", _lock = 0x601100, 
  _offset = -1, __pad1 = 0x0, __pad2 = 0xffffffffffffffff, __pad3 = 0x0, __pad4 = 0x0, __pad5 = 0, 
  _mode = -1, _unused2 = '\000' <repeats 19 times>}
(gdb) next
19	      exit(EXIT_SUCCESS);
(gdb) next
[Inferior 1 (process 5284) exited normally]
(gdb) 

</pre>