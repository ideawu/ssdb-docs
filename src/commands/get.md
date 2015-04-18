# get key

Get the value related to the specified key.

## Parameters

* `key` - 

## Return Value

Status reply.

Return the value to the key, if the key does not exists, return `not_found` Status Code.

## Example

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> get a
	123
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> get a
	not_found
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
