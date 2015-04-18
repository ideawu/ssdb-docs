# incr key [num]

__Since 1.7.0.1, *incr methods return error if value cannot be converted to integer.__

Increment the number stored at key by num. The num argument could be a negative integer. The old number is first converted to an integer before increment, assuming it was stored as literal integer.

## 参数

* `key` - 
* `num` - Optional, must be a signed integer, default is 1

## 返回值

The new value. If the old value cannot be converted to an integer, returns `error` Status Code.

## 示例

	ssdb 127.0.0.1:8888> set a a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> incr a
	error: value is not an integer or out of range
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> incr a
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> incr a 10
	11
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
