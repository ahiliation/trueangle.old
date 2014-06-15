---
layout: post
title: "posix thread internal"
date: 2014-06-15 18:16:28 +0000
comments: true
categories: 
---

<pre>
Breakpoint 1, main () at thread1-p2.c:15
15	  res = pthread_create(&a_thread,NULL,thread_function,(void *)message);
(gdb) print res
$1 = 0
(gdb) next
[New Thread 0x7ffff7816700 (LWP 6689)]
17	  printf("Waiting for thread to finish...\n");
(gdb) print res
$2 = 0
(gdb) next
Thread function is running. Argument was  Hello World
Waiting for thread to finish...
18	  res = pthread_join(a_thread,&thread_result);
(gdb) l
13	  pthread_t a_thread;
14	  void *thread_result;
15	  res = pthread_create(&a_thread,NULL,thread_function,(void *)message);
16	
17	  printf("Waiting for thread to finish...\n");
18	  res = pthread_join(a_thread,&thread_result);
19	
20	  printf("Thread joined, it returned %s \n",(char *)thread_result);
21	  printf("Message is now %s \n",message);
22	  exit(EXIT_SUCCESS);
(gdb) next
[Thread 0x7ffff7816700 (LWP 6689) exited]
20	  printf("Thread joined, it returned %s \n",(char *)thread_result);
(gdb) next
Thread joined, it returned Thank you for the CPU time 
21	  printf("Message is now %s \n",message);
(gdb) next
Message is now Bye! 
22	  exit(EXIT_SUCCESS);
(gdb) next
[Inferior 1 (process 6685) exited normally]
(gdb) next
The program is not being run.
(gdb) 

</pre>