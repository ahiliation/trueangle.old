---
layout: post
title: "internals of a binary to decimal convertion"
date: 2014-09-20 14:38:45 +0000
comments: true
categories: 
---

<pre>
(gdb) break 37
Breakpoint 1 at 0x400e00: file main.c, line 37.
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
Swapping Values [21] 

Breakpoint 1, main () at main.c:37
37	  printf("Finding the decimal value for a binary [22] \n");
(gdb) break binary-to-decimal.c:5
Breakpoint 2 at 0x7ffff7bdaa4d: file binary-to-decimal.c, line 5.
(gdb) next
Finding the decimal value for a binary [22] 
39	 scanf("%d",&option); 
(gdb) next
22
41	  switch(option)
(gdb) next
127	   btd();
(gdb) next

Breakpoint 2, btd () at binary-to-decimal.c:6
6	  int num, binary_val, decimal_val = 0, base = 1, rem;
(gdb) next
7	  printf("Enter a binary number : ");
(gdb) next
8	  scanf("%d",&num);
(gdb) next
Enter a binary number : 101
9	  binary_val = num;
(gdb) print num
$1 = 101
(gdb) next
10	  while ( num > 0 )
(gdb) print binary_val
$2 = 101
(gdb) next
12	      rem = num % 10;
(gdb) print num
$3 = 101
(gdb) print rem
$4 = 0
(gdb) next
13	      decimal_val = decimal_val + rem * base;
(gdb) print rem
$5 = 1
(gdb) next
14	      num = num / 10;
(gdb) print decimal_val
$6 = 1
(gdb) print decimal_val
$7 = 1
(gdb) print base
$8 = 1
(gdb) next
15	      base = base * 2;
(gdb) print base
$9 = 1
(gdb) next
10	  while ( num > 0 )
(gdb) print base
$10 = 2
(gdb) next
12	      rem = num % 10;
(gdb) next
13	      decimal_val = decimal_val + rem * base;
(gdb) print rem
$11 = 0
(gdb) next
14	      num = num / 10;
(gdb) next
15	      base = base * 2;
(gdb) next
10	  while ( num > 0 )
(gdb) next
12	      rem = num % 10;
(gdb) next
13	      decimal_val = decimal_val + rem * base;
(gdb) next
14	      num = num / 10;
(gdb) next
15	      base = base * 2;
(gdb) next
10	  while ( num > 0 )
(gdb) next
17	  printf("The binary number is : %d \n",binary_val);
(gdb) next
The binary number is : 101 
18	  printf("It's decimal equivalent is:  %d \n",decimal_val);
(gdb) next
It's decimal equivalent is:  5 
19	}
(gdb) next
main () at main.c:128
128	   break;
(gdb) next
133	}
(gdb) next
__libc_start_main (main=0x400d26 <main>, argc=1, argv=0x7fffffffe3f8, init=<optimized out>, fini=<optimized out>, 
    rtld_fini=<optimized out>, stack_end=0x7fffffffe3e8) at libc-start.c:321
321	libc-start.c: No such file or directory.
(gdb) 


</pre>