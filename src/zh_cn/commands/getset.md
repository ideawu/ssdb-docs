# getset key value

更新 key 对应的 value, 并返回更新前的旧的 value.

## 参数

* `key` - 
* `value` -

## 返回值

Value reply.

返回修改前 key 对应的值, 如果 key 不存在, 返回 `not_found` 状态码. 注意, 即使返回 `not_found`, 值也会被新加进去.

## 示例

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> getset a 321
	123
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> getset a 321
	not_found
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
