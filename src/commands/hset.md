# hset name key value

Set the string value in argument as value of the key of a hashmap.

## Parameters

* `name` - The name of the hashmap
* `key` - The key of the key-value pair in the hashmap
* `value` - The value of the key-value pair in the hashmap

## Return Value

Returns `1` is the value is updated, if the value is the same as the old, returns `0`.

## Example

	ssdb 127.0.0.1:8888> hdel h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hset h k v
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hset h k v
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
