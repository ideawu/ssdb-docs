# exists key

Verify if the specified key exists.

## 参数

* `key` - 

## 返回值

If the key exists, return `1`, otherwise return `0`.

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
