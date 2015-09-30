# expire key ttl

设置 key(只针对 KV 类型) 的存活时间.

## 参数

* `key` - 
* `ttl` - 存活时间(秒).

## 返回值

Int reply.

如果 key 存在并且 ttl 设置成功, 返回 1, 否则返回 0.

## 示例

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> expire a 3
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> get a
	123
	(0.000 sec)
	# wait for seconds
	ssdb 127.0.0.1:8888> get a
	not_found
	(0.000 sec)
	ssdb 127.0.0.1:8888> expire a 3
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 

