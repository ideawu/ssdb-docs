# hgetall name

返回整个 hashmap.

## 参数

* `name` - hashmap 的名字.

## 返回值

Key-Value list.

The key-value list is return as: k1 v1 k2 v2 ...

## 示例

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
