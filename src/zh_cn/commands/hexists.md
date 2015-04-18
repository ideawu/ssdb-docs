# hexists name key

Verify if the specified key exists in a hashmap.

## 参数

* `name` - The name of the hashmap
* `key` - 

## 返回值

If the key exists, return `1`, otherwise return `0`.

## 示例

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

