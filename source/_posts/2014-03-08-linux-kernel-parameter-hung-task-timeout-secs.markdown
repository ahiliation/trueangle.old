---
layout: post
title: "LINUX KERNEL PARAMETER  hung_task_timeout_secs"
date: 2014-03-08 17:03:59 +0000
comments: true
categories: 
---

GNU/Linux  or UNIX Parameter
<pre>
$cat /proc/sys/kernel/hung_task_timeout_secs
120
$
</pre>
Parameter Related
<pre>
TEST-MAIL1 ~ #dmesg
[cut]
"echo 0 > /proc/sys/kernel/hung_task_timeout_secs" disables this message.
rm D ffff88107f472c40 0 16705 22512 0x00000000
ffff881014693810 0000000000000086 ffff881000000000 ffff88102013b040
0000000000012c40 ffff880471855fd8 0000000000012c40 ffff880471854010
ffff880471855fd8 0000000000012c40 ffff881017ff8e40 0000000100000000
Call Trace:
[<ffffffff8148d45d>] ? schedule_timeout+0x1ed/0x2d0
[<ffffffffa0b7d1ea>] ? dlmlock+0x8a/0xda0 [ocfs2_dlm]
[<ffffffff8148ce5c>] ? wait_for_common+0x12c/0x1a0
[<ffffffff81052230>] ? try_to_wake_up+0x280/0x280
[<ffffffffa0a3b9c0>] ? __ocfs2_cluster_lock+0x1f0/0x780 [ocfs2]
[<ffffffff8148ce80>] ? wait_for_common+0x150/0x1a0
[<ffffffffa0a9c6bc>] ? ocfs2_buffer_cached+0x8c/0x180 [ocfs2]
[<ffffffffa0a40bc6>] ? ocfs2_inode_lock_full_nested+0x126/0x540 [ocfs2]
[<ffffffffa0a5922e>] ? ocfs2_lookup_lock_orphan_dir+0x6e/0x1b0 [ocfs2]
[<ffffffffa0a5922e>] ? ocfs2_lookup_lock_orphan_dir+0x6e/0x1b0 [ocfs2]
[<ffffffffa0a5ba1a>] ? ocfs2_prepare_orphan_dir+0x4a/0x290 [ocfs2]
[<ffffffffa0a5e621>] ? ocfs2_unlink+0x6e1/0xbb0 [ocfs2]
[<ffffffff811bcfea>] ? may_link+0xda/0x170
[<ffffffff81141c8e>] ? vfs_unlink+0x9e/0x100
[<ffffffff81145881>] ? do_unlinkat+0x1a1/0x1d0
[<ffffffff81147b00>] ? vfs_readdir+0xa0/0xe0
[<ffffffff8116fedb>] ? fsnotify_find_inode_mark+0x2b/0x40
[<ffffffff81170c24>] ? dnotify_flush+0x54/0x110
[<ffffffff81133eec>] ? filp_close+0x5c/0x90
[<ffffffff81496912>] ? system_call_fastpath+0x16/0x1b
</pre>

Classroom
<br>
While  waiting for  read()  or write()  to/from  a file  descriptor
return, the process  will be put in a special  kind of sleep, known
as "D"  or "Disk Sleep". This  is special, because  the process can
not  be killed  or interrupted  while in  such a  state.  A process
waiting for  a return from  ioctl() would also  be put to  sleep in
this manner.

source :http://stackoverflow.com/questions/1475683/linux-process-states
Parameter Code Internals
<pre>
/*
 * Check whether a TASK_UNINTERRUPTIBLE does not get woken up for
 * a really long time (120 seconds). If that happens, print out
 * a warning.
 */
static void check_hung_uninterruptible_tasks(unsigned long timeout)
{
	int max_count = sysctl_hung_task_check_count;
	int batch_count = HUNG_TASK_BATCHING;
	struct task_struct *g, *t;

	/*
	 * If the system crashed already then all bets are off,
	 * do not report extra hung tasks:
	 */
	if (test_taint(TAINT_DIE) || did_panic)
		return;

	rcu_read_lock();
	do_each_thread(g, t) {
		if (!max_count--)
			goto unlock;
		if (!--batch_count) {
			batch_count = HUNG_TASK_BATCHING;
			rcu_lock_break(g, t);
			/* Exit if t or g was unhashed during refresh. */
			if (t->state == TASK_DEAD || g->state == TASK_DEAD)
				goto unlock;
		}
		/* use "==" to skip the TASK_KILLABLE tasks waiting on NFS */
		if (t->state == TASK_UNINTERRUPTIBLE)
			check_hung_task(t, timeout);
	} while_each_thread(g, t);
 unlock:
	rcu_read_unlock();
}

</pre>

Related From Research Paper<br>

Kernel  data collection  tools. Several  monitoring  facilities are
provided by  the Linux  kernel, which have  been exploited  in this
work. In  particular, we use  KProbes which inserts  breakpoints in
arbitrary binary code locations in charge of triggering user-defined
handler  functions. Handlers  can  be used  to collect  information
about internal kernel  variables; subsequently, kernel execution is
restored. Kdump is a tool  for failure data collection based on the
execution of  a secondary kernel,  namely capture kernel,  which is
preliminarily  loaded  into  a  reserved memory  region.  When  the
primary kernel fails, the capture  kernel is executed; then, it can
collect failure  data by reading  the main memory  state.  Built-in
hang  detection mechanisms. Several  hang detection  mechanisms are
available in the Linux OS,  which can be enabled by recompiling the
kernel.  In particular, the  following facilities  can be  used for
hang  detection: Soft  lockup detection,  i.e., the  kernel detects
whether a  "canary" task  is not scheduled  within a  timeout; Hard
lockup detection, i.e.,  if any CPU in the  system does not handles
local    timer    interrupt   for    longer    than   a    timeout;
Sleep-inside-spinlock   checking,  i.e.,  assertions   that  verify
whether there are spinlocks  that have been acquired before calling
a  sleeping function  (i.e., a  function during  which  the current
thread may block and be preempted by the scheduler); Checks on lock
API  usage, that  is: missing  lock initialization,  release  of an
already freed lock, release of a  lock by a thread or CPU different
from the lock holder, lock data structure corruption.

source : http://tinyurl.com/7pt5j9a

Assessment and Improvement of Hang Detection in the Linux Operating System
2009 28th IEEE International Symposium on Reliable Distributed Systems
