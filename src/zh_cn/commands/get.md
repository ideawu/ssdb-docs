# get key

获取指定 key 的值内容.

## 参数

* `key` - 

## 返回值

Value reply.

返回 key 对应的值, 如果 key 不存在, 返回 `not_found` 状态码.

## 示例

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> get a
	123
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> get a
	not_found
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
