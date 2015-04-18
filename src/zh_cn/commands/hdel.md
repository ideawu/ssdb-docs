# hdel name key

Delete specified key of a hashmap.

## 参数

* `name` - The name of the hashmap
* `key` - The key of the key-value pair in the hashmap

## 返回值

If the key exists, return `1`, otherwise return `0`.

## 示例

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
