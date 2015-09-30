# setnx key value

当 key 不存在时, 设置指定 key 的值内容. 如果已存在, 则不设置.

## 参数

* `key` - 
* `value` - 

## 返回值

Int reply.

`1`: 设置成功; `0`: key 已经存在.

## 示例

	ssdb 127.0.0.1:8888> del x
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> setnx x 1
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> setnx x 1
	0
	(0.000 sec)
