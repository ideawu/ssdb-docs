# hget name key

获取 hashmap 中指定 key 的值内容.

## 参数

* `name` - hashmap 的名字.
* `key` - hashmap 中的 key. 

## 返回值

Value reply.

Return the value to the key, if the key does not exists, return `not_found` Status Code.

## 示例

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hget h k
	v
	(0.000 sec)
	ssdb 127.0.0.1:8888> hdel h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hget h k
	not_found
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
