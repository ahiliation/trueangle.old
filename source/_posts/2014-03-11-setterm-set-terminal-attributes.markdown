---
layout: post
title: "setterm - set terminal attributes"
date: 2014-03-11 14:42:57 +0000
comments: true
categories: 
---

<pre>
GNU Command
$setterm 
setterm: Argument error.

Usage:
 setterm [options]

Options:
 -term <terminal_name>
 -reset
 -initialize
 -cursor <on|off>
 -repeat <on|off>
 -appcursorkeys <on|off>
 -linewrap <on|off>
 -default
 -foreground <black|blue|green|cyan|red|magenta|yellow|white|default>
 -background <black|blue|green|cyan|red|magenta|yellow|white|default>
 -ulcolor <black|grey|blue|green|cyan|red|magenta|yellow|white>
 -ulcolor <bright blue|green|cyan|red|magenta|yellow|white>
 -hbcolor <black|grey|blue|green|cyan|red|magenta|yellow|white>
 -hbcolor <bright blue|green|cyan|red|magenta|yellow|white>
 -inversescreen <on|off>
 -bold <on|off>
 -half-bright <on|off>
 -blink <on|off>
 -reverse <on|off>
 -underline <on|off>
 -store >
 -clear <all|rest>
 -tabs < tab1 tab2 tab3 ... >      (tabn = 1-160)
 -clrtabs < tab1 tab2 tab3 ... >   (tabn = 1-160)
 -regtabs <1-160>
 -blank <0-60|force|poke>
 -dump   <1-NR_CONSOLES>
 -append <1-NR_CONSOLES>
 -file dumpfilename
 -msg <on|off>
 -msglevel <0-8>
 -powersave <on|vsync|hsync|powerdown|off>
 -powerdown <0-60>
 -blength <0-2000>
 -bfreq freqnumber
 -version
 -help

For more information see lsblk(1).
$





setterm sets terminal attributes.

Explanation

-cursor [on|off]
Turns the terminal's cursor on or off.

Related Source Code Exposition

        if (opt_cursor) {
                if (opt_cu_on)
                        putp(ti_entry("cnorm"));
                else
                        putp(ti_entry("civis"));
        }


Source Code Highlight
 -cursor [on|off].

Featured Image
FIXME

General Knowledge

A  terminal consists of  a screen  and keyboard  that one
uses  to  communicate   remotely  with  a  computer  (the
host). One uses it almost like it was a personal computer
but the terminal is remote from its host computer that it
communicates with (on the other  side of the room or even
on the other side of  the world). Programs execute on the
host  computer but  the results  display on  the terminal
screen.  Originally  terminals  were stand-alone  devices
with  no computational  ability and  thus they  were once
much cheaper in cost than computers. They had no pictures
or  audio, but  could  only display  text  and were  thus
called "text terminals". Today,  the cost of PC computers
is so low  that one may use a PC like  a text terminal by
running a software program to  make it behave like an old
text terminal. You formerly  found real text terminals at
libraries and schools.

</pre>