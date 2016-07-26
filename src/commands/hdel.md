# hdel name key

Delete specified key of a hashmap. To delete the whole hashmap, use [`hclear`](./hclear.html).

## Parameters

* `name` - The name of the hashmap
* `key` - The key of the key-value pair in the hashmap

## Return Value

If the key exists, return `1`, otherwise return `0`.

## Example

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hdel h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hdel h k
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
