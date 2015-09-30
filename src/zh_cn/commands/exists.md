# exists key

判断指定的 key 是否存在.

## 参数

* `key` - 

## 返回值

Int reply.

如果 key 存在, 返回 1, 否则返回 0.

## 示例

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> exists a
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> exists a
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
