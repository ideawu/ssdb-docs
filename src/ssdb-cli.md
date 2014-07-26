# The ssdb-cli Command Line Tool

The SSDB command line tool ```ssdb-cli``` is very usefull for SSDB administration, you can execute all SSDB commands with it, monitoring the status of a SSDB instance, flush a database, etc.

## Connect to a SSDB server

	$ /usr/local/ssdb/ssdb-cli -h 127.0.0.1 -p 8888
    ssdb (cli) - ssdb command line tool.
    Copyright (c) 2012-2013 ideawu.com
    
	'h' or 'help' for help, 'q' to quit.
    
	ssdb 127.0.0.1:8888>

Type in 'h', and press ```Enter``` key to see the help messages. Here is screenshot of demo operates:

	ssdb 127.0.0.1:8888> set k 1
    ok
    (0.000 sec)
    ssdb 127.0.0.1:8888> get k
    1
    (0.000 sec)
    ssdb 127.0.0.1:8888> del k
    ok
    (0.000 sec)
    ssdb 127.0.0.1:8888> get k
    error: not_found
    (0.000 sec)
    ssdb 127.0.0.1:8888>

__For Windows users:__

Run

	deps/cpy/cpy tools/ssdb-cli.cpy

From within the ssdb-master source code folder, Python is required.

## Escape binary data

	: escape

## Monitoring the status of SSDB instance

### info

The ```info``` show the basic info about data stored in SSDB, and the health degree of LevelDB.

	ssdb 127.0.0.1:8899> info
	version
		1.6.7
	key_range.kv
		"TES10" - "TEST999926"
	key_range.hash
		"" - ""
	key_range.zset
		"" - ""
	leveldb.stats
                                      Compactions
        Level  Files Size(MB) Time(sec) Read(MB) Write(MB)
        --------------------------------------------------
          0        0        0         1        0       103
          1        0        0         3      202       361
          2        8      253        18      938       928
	
	11 result(s) (0.001 sec)

__key\_range.*__

Keys of different types are sorted in SSDB, so this shows the minimum key and maximum key of each data type.

__leveldb.stats__

This shows how many files and the amount of size of each level. The smaller the size of lower(with smaller number) level is, the healthier the database is(read operations are faster).

### info cmd

	ssdb 127.0.0.1:8899> info cmd
	version
		1.6.7
	cmd.get
		calls: 20000	time_wait: 27	time_proc: 472
	cmd.set
		calls: 267045	time_wait: 7431	time_proc: 7573
	cmd.setx
		calls: 111100	time_wait: 3663	time_proc: 6456
	cmd.del
		calls: 0	time_wait: 0	time_proc: 0

__cmd.*__

* calls: How many queries of this command has been processed.
* time_wait: The total amount of time(in milliseconds) of all queries' wait time before being processed.
* time_proc: The total amount of time(in milliseconds) of all queries' process time.

### compact

This command force the SSDB server to do compactaction on data, after the compaction, queries are usually much faster.

You should notice that ```compact``` may slow down the service, especially when the database is big. So, you should execute this command when the server is idle.
