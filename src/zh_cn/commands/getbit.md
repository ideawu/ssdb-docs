# getbit key offset

获取字符串内指定位置的位值(BIT).

## 参数

* `key` - 
* `offset` - 位偏移.

## 返回值

Int reply.

返回 `0` 或 `1`.

## 示例

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> getbit a 3
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> getbit a 4
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
