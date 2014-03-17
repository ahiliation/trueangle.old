---
layout: post
title: "tee - read from standard input and write to standard output and files"
date: 2014-03-17 17:47:30 +0000
comments: true
categories: 
---

GNU Command
<pre>
$tee name
my name is nice.
my name is nice.
$cat name
my name is nice.
$

</pre>
<br />
Explanation
<br>
Copy standard  input to each  FILE, and also  to standard
output.  A  special variant of  the tee for the  shell is
called script and  permits duplicating all input commands
submitted to a shell into a file.

<br />
Related Source Code Exposition
<pre>
static bool
tee_files (int nfiles, const char **files)
{
  FILE **descriptors;
  char buffer[BUFSIZ];
  ssize_t bytes_read;
  int i;
  bool ok = true;
  char const *mode_string =
    (O_BINARY
     ? (append ? "ab" : "wb")
     : (append ? "a" : "w"));

  descriptors = xnmalloc (nfiles + 1, sizeof *descriptors);

  /* Move all the names `up' one in the argv array to make room for
     the entry for standard output.  This writes into argv[argc].  */
  for (i = nfiles; i >= 1; i--)
    files[i] = files[i - 1];

  if (O_BINARY && ! isatty (STDIN_FILENO))
    xfreopen (NULL, "rb", stdin);
  if (O_BINARY && ! isatty (STDOUT_FILENO))
    xfreopen (NULL, "wb", stdout);

  /* In the array of NFILES + 1 descriptors, make
     the first one correspond to standard output.   */
  descriptors[0] = stdout;
  files[0] = _("standard output");
  setvbuf (stdout, NULL, _IONBF, 0);

  for (i = 1; i <= nfiles; i++)
    {
      descriptors[i] = (STREQ (files[i], "-")
                        ? stdout
                        : fopen (files[i], mode_string));
      if (descriptors[i] == NULL)
        {
          error (0, errno, "%s", files[i]);
          ok = false;
        }
      else
        setvbuf (descriptors[i], NULL, _IONBF, 0);
    }

  while (1)
    {
      bytes_read = read (0, buffer, sizeof buffer);
#ifdef EINTR
      if (bytes_read < 0 && errno == EINTR)
        continue;
#endif
      if (bytes_read <= 0)
        break;

      /* Write to all NFILES + 1 descriptors.
         Standard output is the first one.  */
      for (i = 0; i <= nfiles; i++)
        if (descriptors[i]
            && fwrite (buffer, bytes_read, 1, descriptors[i]) != 1)
          {
            error (0, errno, "%s", files[i]);
            descriptors[i] = NULL;
            ok = false;
          }
    }

  if (bytes_read == -1)
    {
      error (0, errno, _("read error"));
      ok = false;
    }

  /* Close the files, but not standard output.  */
  for (i = 1; i <= nfiles; i++)
    if (!STREQ (files[i], "-")
        && descriptors[i] && fclose (descriptors[i]) != 0)
      {
        error (0, errno, "%s", files[i]);
        ok = false;
      }

  free (descriptors);

  return ok;
}
</pre>
<br />
Source Code Highlight
<br>
Copy the standard input into  each of the NFILES files in
FILES  and  into the  standard  output.   Return true  if
successful.

Featured Image
FIXME

<br />
Related Knowledge
<br>
The  `tee'  command  copies  standard input  to  standard
output and also to any files given as arguments.  This is
useful when  you want not only  to send some  data down a
pipe, but also to save a copy.
