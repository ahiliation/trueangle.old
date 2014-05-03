---
layout: post
title: "simple debug of a python program"
date: 2014-05-03 20:39:12 +0000
comments: true
categories: 
---

<pre>
$python -m pdb bubblesort-unsure.py 
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(1)<module>()
-> array_size = 10;
(Pdb) help

Documented commands (type help <topic>):
========================================
EOF    bt         cont      enable  jump  pp       run      unt   
a      c          continue  exit    l     q        s        until 
alias  cl         d         h       list  quit     step     up    
args   clear      debug     help    n     r        tbreak   w     
b      commands   disable   ignore  next  restart  u        whatis
break  condition  down      j       p     return   unalias  where 

Miscellaneous help topics:
==========================
exec  pdb

Undocumented commands:
======================
retval  rv

(Pdb) break 1
Breakpoint 1 at /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py:1
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(3)<module>()
-> import random
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(4)<module>()
-> result = []
(Pdb) print result
*** NameError: name 'result' is not defined
(Pdb) print result[]
*** SyntaxError: invalid syntax (<stdin>, line 1)
(Pdb) print result[0]
*** NameError: name 'result' is not defined
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(10)<module>()
-> for x in range (0, 10):
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(11)<module>()
-> num = random.randint(0, 10)
(Pdb) print x
0
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(12)<module>()
-> while num in result:
(Pdb) print num
3
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(14)<module>()
-> result.append(num)
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(10)<module>()
-> for x in range (0, 10):
(Pdb) print result
[3]
(Pdb) next
> /home/jeffrin/beautifulwork-sorting/python/bubblesort-unsure.py(11)<module>()
-> num = random.randint(0, 10)
(Pdb) quit
$

</pre>