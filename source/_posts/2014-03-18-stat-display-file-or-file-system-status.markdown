---
layout: post
title: "stat - display file or file system status"
date: 2014-03-18 18:35:13 +0000
comments: true
categories: 
---


GNU Command  stat -f  /
<pre>
$stat -f /
  File: "/"
    ID: bc427fdafb7b0541 Namelen: 255     Type: ext2/ext3
Block size: 4096       Fundamental block size: 4096
Blocks: Total: 18864769   Free: 16209639   Available: 15251363
Inodes: Total: 4792320    Free: 4684854
$

</pre>
Explanation<br>
Display file or file system status.

Related Source Code Exposition
<pre>
static bool
do_statfs (char const *filename, bool terse, char const *format)
{
  STRUCT_STATVFS statfsbuf;

  if (STATFS (filename, &statfsbuf) != 0)
    {
      error (0, errno, _("cannot read file system information for %s"),
             quote (filename));
      return false;
    }

  if (format == NULL)
    {
      format = (terse
                ? "%n %i %l %t %s %S %b %f %a %c %dn"
                : "  File: "%n"n"
                "    ID: %-8i Namelen: %-7l Type: %Tn"
                "Block size: %-10s Fundamental block size: %Sn"
                "Blocks: Total: %-10b Free: %-10f Available: %an"
                "Inodes: Total: %-10c Free: %dn");
    }

  print_it (format, filename, print_statfs, &statfsbuf);
  return true;
}

</pre>
Source Code Highlight<br>

Stat the file system and print what we find.
<br />
Featured Image<br>
FIXME

Related Knowledge<br>
Due to  shell aliases and built-in  `stat' command, using
an unadorned `stat' interactively  or in a script may get
you  different functionality  than  that described  here.
Invoke  it via  `env' (i.e.,  `env stat  ...')   to avoid
interference from the shell.
