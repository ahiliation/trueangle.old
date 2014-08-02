---
layout: post
title: "integer declared but float option in scanf"
date: 2014-08-02 17:06:52 +0000
comments: true
categories: 
---


<pre>
(gdb) break 1
Breakpoint 1 at 0x4005be: file find-maximum-value.c, line 1.
(gdb) r
Starting program: /home/jeffrin/libeautifulwork/a.out 

Breakpoint 1, main () at find-maximum-value.c:36
36	  r = 0;
(gdb) next
37	  i = 1;
(gdb) next
39	  printf("Enter the number of elements in the array: ");
(gdb) next
40	  scanf("%f",&n);
(gdb) next
Enter the number of elements in the array: 10
41	  printf("enter values to the array \n");
(gdb) next
enter values to the array 
42	  for (j=0;j < n;j++){
(gdb) print j
$1 = 32767
(gdb) print n
$2 = 1092616192
(gdb) l
37	  i = 1;
38	
39	  printf("Enter the number of elements in the array: ");
40	  scanf("%f",&n);
41	  printf("enter values to the array \n");
42	  for (j=0;j < n;j++){
43	    scanf("%f", &a[j]);
44	  }
45	
46	  while ( i < n )
(gdb) 

</pre>


