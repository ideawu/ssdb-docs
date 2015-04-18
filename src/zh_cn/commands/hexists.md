# hexists name key

Verify if the specified key exists in a hashmap.

## Parameters

* `name` - The name of the hashmap
* `key` - 

## Return Value

If the key exists, return `1`, otherwise return `0`.

## Example

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hexists h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hdel h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hexists h k
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 

