---
layout: post
title: "nc - TCP/IP swiss army knife"
date: 2014-03-13 13:37:48 +0000
comments: true
categories: 
---

A UNIX Command

Window I Server 

<pre>
$nc -l -p  3333
hello
hello
how are you ?
fine
</pre>

Window II client
<pre>
$nc 127.0.0.1 3333
hello
hello
how are you ?
fine
</pre>

Explanation

netcat is a simple unix utility which reads and writes data
across network connections, using TCP or UDP protocol.


Related Source Code Exposition
<pre>
doexec (fd)
  int fd;
{
  register char * p;

  dup2 (fd, 0);                         /* the precise order of fiddlage */
  close (fd);                           /* is apparently crucial; this is */
  dup2 (0, 1);                          /* swiped directly out of "inetd". */

  if (doexec_use_sh) {
Debug (("gonna exec "%s" using /bin/sh...", pr00gie))
    execl ("/bin/sh", "sh", "-c", pr00gie, NULL);
    bail ("exec %s failed", pr00gie);   /* this gets sent out.  Hmm... */
  }

  p = strrchr (pr00gie, '/');           /* shorter argv[0] */
  if (p)
    p++;
  else
    p = pr00gie;
Debug (("gonna exec %s as %s...", pr00gie, p))
  execl (pr00gie, p, NULL);
  bail ("exec %s failed", pr00gie);     /* this gets sent out.  Hmm... */
} /* doexec */

</pre>

Source Code Highlight

fiddle all  the file descriptors around, and  hand off to
another prog.  Sort of like a one-off "poor man's inetd".
This  is   the  only  section  of  code   that  would  be
security-critical,  which  is  why  it's ifdefed  out  by
default.  Use at your own hairy risk; if you leave shells
lying around  behind open listening ports  you deserve to
lose!!

Featured Image
FIXME

Related Knowledge

It has been suggested  that the open() system call should
get   a  flag   which  would   cause  it   to   select  a
non-sequential   file   descriptor   from   the   outset,
eliminating   the   need   for   a   separate   call   to
nonseqfd(). There are, however,  a number of system calls
which  create file  descriptors but  which have  no flags
parameter and  which, thus, will never be  able to return
non-sequential  file descriptors;  socket() is  a classic
example. So there will still  be a need for a system call
which can duplicate a file descriptor into the new space.

source : http://lwn.net/Articles/236843/

<a href="http://www.g-loaded.eu/2006/11/06/netcat-a-couple-of-useful-examples/">netcat examples</a>