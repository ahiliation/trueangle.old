---
layout: post
title: "simple debug of a bubble sort related  using ruby"
date: 2014-04-03 15:32:00 +0000
comments: true
categories: 
---

<pre>
$ruby -rdebug bubblesort.rb 
Debug.rb
Emacs support available.

bubblesort.rb:12:array_size = 300
(rdb:1) break 1
Set breakpoint 1 at bubblesort.rb:1
(rdb:1) help
Debugger help v.-0.002b
Commands
  b[reak] [file:|class:]<line|method>
  b[reak] [class.]<line|method>
                             set breakpoint to some position
  wat[ch] <expression>       set watchpoint to some expression
  cat[ch] (<exception>|off)  set catchpoint to an exception
  b[reak]                    list breakpoints
  cat[ch]                    show catchpoint
  del[ete][ nnn]             delete some or all breakpoints
  disp[lay] <expression>     add expression into display expression list
  undisp[lay][ nnn]          delete one particular or all display expressions
  c[ont]                     run until program ends or hit breakpoint
  s[tep][ nnn]               step (into methods) one line or till line nnn
  n[ext][ nnn]               go over one line or till line nnn
  w[here]                    display frames
  f[rame]                    alias for where
  l[ist][ (-|nn-mm)]         list program, - lists backwards
                             nn-mm lists given lines
  up[ nn]                    move to higher frame
  down[ nn]                  move to lower frame
  fin[ish]                   return to outer frame
  tr[ace] (on|off)           set trace mode of current thread
  tr[ace] (on|off) all       set trace mode of all threads
  q[uit]                     exit from debugger
  v[ar] g[lobal]             show global variables
  v[ar] l[ocal]              show local variables
  v[ar] i[nstance] <object>  show instance variables of object
  v[ar] c[onst] <object>     show constants of object
  m[ethod] i[nstance] <obj>  show methods of object
  m[ethod] <class|module>    show instance methods of class or module
  th[read] l[ist]            list all threads
  th[read] c[ur[rent]]       show current thread
  th[read] [sw[itch]] <nnn>  switch thread context to nnn
  th[read] stop <nnn>        stop thread nnn
  th[read] resume <nnn>      resume thread nnn
  p expression               evaluate expression and print its value
  h[elp]                     print this help
  <everything else>          evaluate
(rdb:1) 
help
Debugger help v.-0.002b
Commands
  b[reak] [file:|class:]<line|method>
  b[reak] [class.]<line|method>
                             set breakpoint to some position
  wat[ch] <expression>       set watchpoint to some expression
  cat[ch] (<exception>|off)  set catchpoint to an exception
  b[reak]                    list breakpoints
  cat[ch]                    show catchpoint
  del[ete][ nnn]             delete some or all breakpoints
  disp[lay] <expression>     add expression into display expression list
  undisp[lay][ nnn]          delete one particular or all display expressions
  c[ont]                     run until program ends or hit breakpoint
  s[tep][ nnn]               step (into methods) one line or till line nnn
  n[ext][ nnn]               go over one line or till line nnn
  w[here]                    display frames
  f[rame]                    alias for where
  l[ist][ (-|nn-mm)]         list program, - lists backwards
                             nn-mm lists given lines
  up[ nn]                    move to higher frame
  down[ nn]                  move to lower frame
  fin[ish]                   return to outer frame
  tr[ace] (on|off)           set trace mode of current thread
  tr[ace] (on|off) all       set trace mode of all threads
  q[uit]                     exit from debugger
  v[ar] g[lobal]             show global variables
  v[ar] l[ocal]              show local variables
  v[ar] i[nstance] <object>  show instance variables of object
  v[ar] c[onst] <object>     show constants of object
  m[ethod] i[nstance] <obj>  show methods of object
  m[ethod] <class|module>    show instance methods of class or module
  th[read] l[ist]            list all threads
  th[read] c[ur[rent]]       show current thread
  th[read] [sw[itch]] <nnn>  switch thread context to nnn
  th[read] stop <nnn>        stop thread nnn
  th[read] resume <nnn>      resume thread nnn
  p expression               evaluate expression and print its value
  h[elp]                     print this help
  <everything else>          evaluate
(rdb:1) next
bubblesort.rb:13:x = 0
(rdb:1) next
bubblesort.rb:14:y = 0
(rdb:1) w
--> #1 bubblesort.rb:14
(rdb:1) l
[9, 18] in bubblesort.rb
   9  =end
   10  
   11  
   12  array_size = 300
   13  x = 0
=> 14  y = 0
   15  z = 0
   16  hold = 0
   17  ran = Array.new(array_size)
   18  
(rdb:1) up
At toplevel
#1 bubblesort.rb:14
(rdb:1) down
At stack bottom
#1 bubblesort.rb:14
(rdb:1) next
bubblesort.rb:15:z = 0
(rdb:1) next
bubblesort.rb:16:hold = 0
(rdb:1) next
bubblesort.rb:17:ran = Array.new(array_size)
(rdb:1) next
bubblesort.rb:19:while x < array_size  
(rdb:1) next
bubblesort.rb:20:    ran[x] = rand(1..1000)
(rdb:1) next
bubblesort.rb:21:    x +=1
(rdb:1) next
bubblesort.rb:20:    ran[x] = rand(1..1000)
(rdb:1) w
--> #1 bubblesort.rb:20
(rdb:1) l
[15, 24] in bubblesort.rb
   15  z = 0
   16  hold = 0
   17  ran = Array.new(array_size)
   18  
   19  while x < array_size  
=> 20      ran[x] = rand(1..1000)
   21      x +=1
   22  end
   23  
   24  x = 0
(rdb:1) trace on
Trace on.
(rdb:1) next
#0:bubblesort.rb:21::-:     x +=1
bubblesort.rb:21:    x +=1
(rdb:1) next
#0:bubblesort.rb:20::-:     ran[x] = rand(1..1000)
bubblesort.rb:20:    ran[x] = rand(1..1000)
(rdb:1) next
#0:bubblesort.rb:21::-:     x +=1
bubblesort.rb:21:    x +=1
(rdb:1) trace off
Trace off.
(rdb:1) next
bubblesort.rb:20:    ran[x] = rand(1..1000)
(rdb:1) next
bubblesort.rb:21:    x +=1
(rdb:1) next
bubblesort.rb:20:    ran[x] = rand(1..1000)
(rdb:1) w
--> #1 bubblesort.rb:20
(rdb:1) f
--> #1 bubblesort.rb:20
(rdb:1) l
[15, 24] in bubblesort.rb
   15  z = 0
   16  hold = 0
   17  ran = Array.new(array_size)
   18  
   19  while x < array_size  
=> 20      ran[x] = rand(1..1000)
   21      x +=1
   22  end
   23  
   24  x = 0
(rdb:1) q
Really quit? (y/n) y
$

</pre>