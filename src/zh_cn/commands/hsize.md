# hsize name

返回 hashmap 中的元素个数.

## 参数

* `name` - hashmap 的名字.

## 返回值

Integer reply.

## 示例

	ssdb 127.0.0.1:8888> hsize h
	7
	(0.000 sec)
	ssdb 127.0.0.1:8888> hclear h
	7
	(0.000 sec)
	ssdb 127.0.0.1:8888> hsize h
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
