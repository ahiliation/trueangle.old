---
layout: post
title: "true - do nothing, successfully. false  - do nothing, unsuccessfully "
date: 2014-03-09 14:51:37 +0000
comments: true
categories: 
---

<pre>
GNU command

$true
$echo $?
0
$false
$echo $?
1
$
Explanation

true - do nothing, successfully
exit with a status code indicating success.
false - do nothing, unsuccessfully
exit with a status code indicating failure.
Related Source Code Exposition

int
main (int argc, char **argv)
{

  if (argc == 2)
    {
      initialize_main (&argc, &argv);
      set_program_name (argv[0]);
      setlocale (LC_ALL, "");
      bindtextdomain (PACKAGE, LOCALEDIR);
      textdomain (PACKAGE);

      atexit (close_stdout);

      if (STREQ (argv[1], "--help"))
        usage (EXIT_STATUS);

      if (STREQ (argv[1], "--version"))
        version_etc (stdout, PROGRAM_NAME, PACKAGE_NAME, Version, AUTHORS,
                     (char *) NULL);
    }

  exit (EXIT_STATUS);
}

Source Code Highlight
Recognize --help or --version only if it's the only
command-line argument.
Featured Image
FIXME
Related Knowledge

`true' does  nothing except return  an exit status  of 0,
meaning "success".  It  can be used as a  place holder in
shell  scripts  where  a  successful command  is  needed,
although the  shell built-in  command `:' (colon)  may do
the same thing faster.   In most modern shells, `true' is
a built-in command,  so when you use `true'  in a script,
you're probably  using the built-in command,  not the one
documented here.

Note,  however, that it  is possible  to cause  `true' to
exit   with  nonzero   status:  with   the   `--help'  or
`--version'  option,  and  with standard  output  already
closed or redirected to a  file that evokes an I/O error.
For example, using a Bourne-compatible shell:

 $ ./true --version >&-
     ./true: write error: Bad file number
     $ ./true --version > /dev/full
     ./true: write error: No space left on device

This version of `true' is implemented as a C program, and
is  thus  more secure  and  faster  than  a shell  script
implementation, and  may safely be used as  a dummy shell
for the purpose of disabling accounts.
source : info coreutils 'true invocation'
</pre>