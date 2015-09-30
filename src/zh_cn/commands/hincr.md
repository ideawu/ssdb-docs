# hincr name key [num]

__从 1.7.0.1 起, 如果 value 不能转换成整数, *incr 会返回错误.__

使 hashmap 中的 key 对应的值增加 num. 参数 num 可以为负数. 如果原来的值不是整数(字符串形式的整数), 它会被先转换成整数.

## 参数

* `name` - hashmap 的名字.
* `key` - 
* `num` - 可选, 必须是有符号整数, 默认是 1. 

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
