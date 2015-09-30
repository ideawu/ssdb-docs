# setbit key offset val

设置字符串内指定位置的位值(BIT), 字符串的长度会自动扩展.

## 参数

* `key` - 
* `offset` - 位偏移.
* `val` - 0 或 1.

## 返回值

Int reply.

返回设置前原来偏移位置的位值, 如果参数 val 不是 0 或 1, 返回 `client_error` 状态码.

## 示例

	ssdb 127.0.0.1:8888> setbit x 3 1
	0
	(0.001 sec)
	ssdb 127.0.0.1:8888> get x
	
	(0.000 sec)
	ssdb 127.0.0.1:8888> setbit x 3 0
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> setbit x 3 a
	client_error: bit is not an integer or out of range
	(0.000 sec)
