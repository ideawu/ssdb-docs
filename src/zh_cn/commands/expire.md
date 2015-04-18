# expire key ttl

Set the time left to live in seconds, only for keys of KV type.

## Parameters

* `key` - 
* `ttl` - number of seconds to live.

## Return Value

If the key exists and `ttl` is set, return `1`, otherwise return `0`.

## Example

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> expire a 3
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> get a
	123
	(0.000 sec)
	# wait for seconds
	ssdb 127.0.0.1:8888> get a
	not_found
	(0.000 sec)
	ssdb 127.0.0.1:8888> expire a 3
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 

