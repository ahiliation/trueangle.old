---
layout: post
title: "debug session of program to swap values "
date: 2014-09-16 14:40:23 +0000
comments: true
categories: 
---

<pre>
(gdb) break 36
Breakpoint 1 at 0x400db6: file main.c, line 36.
(gdb) r
Starting program: /home/jeffrin/beautifulwork/lib/app 
Sign detection [1] 
Power of two [2] 
Counting No. of bits set [3] 
Set or clear bits without branching[4] 
Find maximum value[5] 
Finding least common multiple[6] 
Finding the greatest commom divisor[7] 
Finding if a number is an Armstrong number or not[8] 
Finding if a given number is prime number[9]  
Finding the number of twin prime numbers[10] 
Finding if a number is palindrome or not[11] 
Finding prime factor of a number[12] 
Finding the value of M^N[13] 
Finding factorial of a number[14] 
Finding the sum of the series 1! + 2! +...+N! [15] 
Finding the sume of the series 1 + 2 +...+N [16] 
Finding Parity of an Integer [17] 
Finding the biggest among three numbers [18] 
Finding the sum of even and odd numbers up to a number N [19] 
Finding the sum and number of integers divisible by 5 [20] 

Breakpoint 1, main () at main.c:36
36	  printf("Swapping Values [21] \n");
(gdb) break swap-values.c:6
Breakpoint 2 at 0x7ffff7bda9af: file swap-values.c, line 6.
(gdb) next
Swapping Values [21] 
38	 scanf("%d",&option); 
(gdb) next
21
40	  switch(option)
(gdb) next
122	   swap_values();
(gdb) next

Breakpoint 2, swap_values () at swap-values.c:9
9	  printf("Enter integer values to be swapped: ");
(gdb) next
10	  scanf("%d %d",&a,&b);
(gdb) next
Enter integer values to be swapped: 3 5
11	  *ptr1 = a;
(gdb) printf a
Bad format string, missing '"'.
(gdb) print a
$1 = 3
(gdb) print ptr1
$2 = (int *) 0x7ffff7ffe1a8
(gdb) print *ptr1
$3 = 0
(gdb) next
12	  *ptr2 = b;
(gdb) print *ptr1
$4 = 3
(gdb) next

Program received signal SIGSEGV, Segmentation fault.
0x00007ffff7bda9ec in swap_values () at swap-values.c:12
12	  *ptr2 = b;
(gdb) bt
#0  0x00007ffff7bda9ec in swap_values () at swap-values.c:12
#1  0x0000000000400f06 in main () at main.c:122
(gdb) l
7	  int *ptr1, *ptr2;
8	  int a, b;
9	  printf("Enter integer values to be swapped: ");
10	  scanf("%d %d",&a,&b);
11	  *ptr1 = a;
12	  *ptr2 = b;
13	  temp = *ptr1;
14	  *ptr1 = *ptr2;
15	  *ptr2 = temp;
16	  printf("Swapped values are %d %d: \n",a,b);
(gdb) 


</pre>