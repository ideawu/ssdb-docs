# del key

删除指定的 key.

## 参数

* `key` - 

## 返回值

Status reply.

即使 key 不存在, 也会返回 `ok`.

## 示例

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
