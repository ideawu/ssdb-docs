# hset name key value

设置 hashmap 中指定 key 对应的值内容.

## 参数

* `name` - hashmap 的名字.
* `key` - hashmap 中的 key.
* `value` - key 对应的值内容. 

## 返回值

Returns `1` is the value is updated, if the value is the same as the old, returns `0`.

## 示例

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
