# hincr name key [num]

__Since 1.7.0.1, *incr methods return error if value cannot be converted to integer.__

Increment the number stored at key in a hashmap by num. The num argument could be a negative integer. The old number is first converted to an integer before increment, assuming it was stored as literal integer.

## 参数

* `name` - the name of the hashmap
* `key - 
* `num` - Optional, must be a signed integer, default is 1

## 返回值

The new value. If the old value cannot be converted to an integer, returns `error` Status Code.

## 示例

	ssdb 127.0.0.1:8888> hset h k v
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> hincr h k
	error: value is not an integer or out of range
	(0.001 sec)
	ssdb 127.0.0.1:8888> hdel h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hincr h k
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> hincr h k
	2
	(0.000 sec)
	ssdb 127.0.0.1:8888> hincr h k 10
	12
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
