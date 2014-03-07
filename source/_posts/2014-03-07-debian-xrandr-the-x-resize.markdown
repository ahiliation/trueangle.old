---
layout: post
title: "DEBIAN xrandr The X Resize"
date: 2014-03-07 22:56:07 +0000
comments: true
categories: 
---

<pre>
$xrandr | grep connected
VGA-0 connected 1024x768+0+0 (normal left inverted right x axis y axis) 340mm x 270mm
$xrandr --output VGA-0 --brightness 1
$xrandr --output VGA-0 --brightness 0.5
$

<u>Theory Drop</u>
The X Resize, Rotate and Reflect Extension (RandR)[2] is an X Window System extension, which allows clients to dynamically change X screens, so as to resize, rotate and reflect the root window of a screen.
</pre>
source:http://en.wikipedia.org/wiki/RandR