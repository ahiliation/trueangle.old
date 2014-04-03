---
layout: post
title: "simple debug related  of a bubble sort related written in ruby"
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