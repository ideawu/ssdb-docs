# hdel name key

删除 hashmap 中的指定 key.

## 参数

* `name` - hashmap 的名字.
* `key` - hashmap 中的 key.

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
