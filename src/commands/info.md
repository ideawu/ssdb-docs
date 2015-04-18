# INFO [opt]

Return information about the server.

## Parameters

* ```opt``` - optional, could be ```cmd```, ```leveldb```

## Return value

Return an associative array of information about the server.

## Examples

	ssdb 127.0.0.1:8888> INFO
	version
		1.9.0
	links
		1
	total_calls
		27
	dbsize
		0
	binlogs
			capacity : 10000000
			min_seq  : 0
			max_seq  : 2
	serv_key_range
			kv  : "" - ""
			hash: "" - ""
			zset: "" - ""
			list: "" - ""
	data_key_range
			kv  : "a" - "c"
			hash: "" - ""
			zset: "" - ""
			list: "" - ""
	leveldb.stats
									Compactions
		Level  Files Size(MB) Time(sec) Read(MB) Write(MB)
		--------------------------------------------------
		
	17 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> INFO leveldb
	version
		1.9.0
	links
		1
	total_calls
		28
	dbsize
		0
	binlogs
			capacity : 10000000
			min_seq  : 0
			max_seq  : 2
	serv_key_range
			kv  : "" - ""
			hash: "" - ""
			zset: "" - ""
			list: "" - ""
	leveldb.stats
									Compactions
		Level  Files Size(MB) Time(sec) Read(MB) Write(MB)
		--------------------------------------------------
		
	15 result(s) (0.001 sec)
	ssdb 127.0.0.1:8888> 

