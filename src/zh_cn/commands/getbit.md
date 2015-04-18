# getbit key offset

Return a single bit out of a string.

## 参数

* `key` - 
* `offset` - bit offset.

## 返回值

`0` or `1`.

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
