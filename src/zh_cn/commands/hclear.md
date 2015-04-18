# hclear name

Delete all keys in a hashmap.

## 参数

* `name` - The name of the hashmap.

## 返回值

The number of key deleted in that hashmap.

## 示例

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hclear h
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hclear h
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
