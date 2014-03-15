---
layout: post
title: "free - Display amount of free and used memory in the system"
date: 2014-03-15 16:49:08 +0000
comments: true
categories: 
---

GNU command
<pre>
$free
             total       used       free     shared    buffers     cached
Mem:        507008     432908      74100          0      14700     186816
-/+ buffers/cache:     231392     275616
Swap:      1485972          0    1485972
$free -m
             total       used       free     shared    buffers     cached
Mem:           495        422         72          0         14        182
-/+ buffers/cache:        225        269
Swap:         1451          0       1451
$

</pre>

Explanation<br>
Display amount of free and used memory in the system.
<br />

<pre>
Related Source Code Exposition
#define S(X) ( ((unsigned long long)(X) << 10) >> shift)

const char help_message[] =
"usage: free [-b|-k|-m|-g] [-l] [-o] [-t] [-s delay] [-c count] [-V]n"
"  -b,-k,-m,-g show output in bytes, KB, MB, or GBn"
"  -l show detailed low and high memory statisticsn"
"  -o use old format (no -/+buffers/cache line)n"
"  -t display total for RAM + swapn"
"  -s update every [delay] secondsn"
"  -c update [count] timesn"
"  -V display version information and exitn"
;

int main(int argc, char *argv[]){
    int i;
    int count = 0;
    int shift = 10;
    int pause_length = 0;
    int show_high = 0;
    int show_total = 0;
    int old_fmt = 0;

    /* check startup flags */
    while( (i = getopt(argc, argv, "bkmglotc:s:V") ) != -1 )
        switch (i) {
        case 'b': shift = 0;  break;
        case 'k': shift = 10; break;
        case 'm': shift = 20; break;
        case 'g': shift = 30; break;
        case 'l': show_high = 1; break;
        case 'o': old_fmt = 1; break;
        case 't': show_total = 1; break;
        case 's': pause_length = 1000000 * atof(optarg); break;
        case 'c': count = strtoul(optarg, NULL, 10); break;
	case 'V': display_version(); exit(0);
        default:
            fwrite(help_message,1,strlen(help_message),stderr);
	    return 1;
    }

    do {
        meminfo();
        printf("             total       used       free     shared    buffers     cachedn");
        printf(
            "%-7s %10Lu %10Lu %10Lu %10Lu %10Lu %10Lun", "Mem:",
            S(kb_main_total),
            S(kb_main_used),
            S(kb_main_free),
            S(kb_main_shared),
            S(kb_main_buffers),
            S(kb_main_cached)
        );
        // Print low vs. high information, if the user requested it.
        // Note we check if low_total==0: if so, then this kernel does
        // not export the low and high stats.  Note we still want to
        // print the high info, even if it is zero.
        if (show_high) {
            printf(
                "%-7s %10Lu %10Lu %10Lun", "Low:",
                S(kb_low_total),
                S(kb_low_total - kb_low_free),
                S(kb_low_free)
            );
            printf(
                "%-7s %10Lu %10Lu %10Lun", "High:",
                S(kb_high_total),
                S(kb_high_total - kb_high_free),
                S(kb_high_free)
            );
        }
        if(!old_fmt){
            unsigned KLONG buffers_plus_cached = kb_main_buffers + kb_main_cached;
            printf(
                "-/+ buffers/cache: %10Lu %10Lun",
                S(kb_main_used - buffers_plus_cached),
                S(kb_main_free + buffers_plus_cached)
            );
        }
        printf(
            "%-7s %10Lu %10Lu %10Lun", "Swap:",
            S(kb_swap_total),
            S(kb_swap_used),
            S(kb_swap_free)
        );
        if(show_total){
            printf(
                "%-7s %10Lu %10Lu %10Lun", "Total:",
                S(kb_main_total + kb_swap_total),
                S(kb_main_used  + kb_swap_used),
                S(kb_main_free  + kb_swap_free)
            );
        }
        if(pause_length){
	    fputc('n', stdout);
	    fflush(stdout);
	    if (count != 1) usleep(pause_length);
	}
    } while(pause_length && --count);

    return 0;
}

</pre>
<br />
Source Code Highlight
#define S(X) ( ((unsigned long long)(X) << 10) >> shift)

it  takes  a  number,  X,  casts  it  to  a  'long  long'
(presumably the  longest int type  on your system  ?) and
then it left-shifts by  10 (meaning, the the positions of
all bits are shifted 10 places to the left) only to shift
it back right 'shift' number of positions.

source : nickname - psuedonymous. server - irc.freenode.net
Featured Image
FIXME 

Related Knowledge

free displays the total  amount of free and used physical
and swap  memory in  the system, as  well as  the buffers
used by  the kernel.  The shared memory  column should be
ignored; it is obsolete.

source : debian manual for free.
