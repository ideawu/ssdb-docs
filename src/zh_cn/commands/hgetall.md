# hgetall name

Returns the whole hash, as an array of strings indexed by strings.

## Parameters

* `name` - The name of the hashmap

## Return Value

Key-Value list.

The key-value list is return as: k1 v1 k2 v2 ...

## Example

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hset h k v2
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hgetall h
	key             value
	-------------------------
	  k               : v2
	1 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> 
