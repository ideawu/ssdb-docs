# hclear name

删除 hashmap 中的所有 key.

## 参数

* `name` - hashmap 的名字.

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
