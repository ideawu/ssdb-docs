# hclear name

Delete all keys in a hashmap.

## Parameters

* `name` - The name of the hashmap.

## Return Value

The number of key deleted in that hashmap.

## Example

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hclear h
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hclear h
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
