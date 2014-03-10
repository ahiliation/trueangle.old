---
layout: post
title: "dig domain information groper "
date: 2014-03-10 13:47:58 +0000
comments: true
categories: 
---

<pre>
GNU Command

$dig www.beautifulwork.org

; <<>> DiG 9.7.1-P2 <<>> www.beautifulwork.org
;; global options: +cmd
;; Got answer:
;; ->>HEADER<<- opcode: QUERY, status: NOERROR, id: 21332
;; flags: qr rd ra; QUERY: 1, ANSWER: 2, AUTHORITY: 0, ADDITIONAL: 0

;; QUESTION SECTION:
;www.beautifulwork.org.		IN	A

;; ANSWER SECTION:
www.beautifulwork.org.	1554	IN	CNAME	beautifulwork.org.
beautifulwork.org.	1555	IN	A	66.232.98.219

;; Query time: 37 msec
;; SERVER: 192.168.1.1#53(192.168.1.1)
;; WHEN: Fri Feb 18 21:18:42 2011
;; MSG SIZE  rcvd: 69

$


$dig +nocomments +noanswer +noadditional +noquestion +nocmd www.beautifulwork.org
;; Query time: 36 msec
;; SERVER: 192.168.1.1#53(192.168.1.1)
;; WHEN: Fri Feb 18 21:21:56 2011
;; MSG SIZE  rcvd: 69

$


Explanation


dig (domain  information groper)  is a flexible  tool for
interrogating DNS  name servers. It  performs DNS lookups
and displays the answers  that are returned from the name
server(s) that were  queried. Most DNS administrators use
dig   to  troubleshoot  DNS   problems  because   of  its
flexibility, ease  of use  and clarity of  output.  Other
lookup tools tend to have less functionality than dig.


Related Source Code Exposition

#ifndef NOPOSIX

                INSIST(batchfp == NULL);
                homedir = getenv("HOME");
                if (homedir != NULL) {
                        unsigned int n;
                        n = snprintf(rcfile, sizeof(rcfile), "%s/.digrc",
                                     homedir);
                        if (n < sizeof(rcfile))
                                batchfp = fopen(rcfile, "r");
                }
                if (batchfp != NULL) {
                        while (fgets(batchline, sizeof(batchline),
                                     batchfp) != 0) {
                                debug("config line %s", batchline);
                                bargc = 1;
                                input = batchline;
                                bargv[bargc] = next_token(&input, " trn");
                                while ((bargv[bargc] != NULL) &&
                                       (bargc < 62)) {
                                        bargc++;
                                        bargv[bargc] =
                                                next_token(&input, " trn");
                                }

                                bargv[0] = argv[0];
                                argv0 = argv[0];

                                for(i = 0; i < bargc; i++)
                                        debug(".digrc argv %d: %s",
                                              i, bargv[i]);
                                parse_args(ISC_TRUE, ISC_TRUE, bargc,
                                           (char **)bargv);
                        }
                        fclose(batchfp);
                }
#endif


Source Code Highlight
Treat ${HOME}/.digrc as a special batchfile.


Featured Image

fixme 
</pre>