# hexists name key

判断指定的 key 是否存在于 hashmap 中.

## 参数

* `name` - hashmap 的名字.
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

