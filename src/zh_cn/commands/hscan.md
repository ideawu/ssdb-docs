# hscan name key_start key_end limit

列出 hashmap 中处于区间 (key_start, key_end] 的 key-value 列表.

("", ""] 表示整个区间.

## 参数

* `name` - hashmap 的名字.
* `key_start` - 返回的起始 key(不包含), 空字符串表示 -inf.
* `key_end` - 返回的结束 key(包含), 空字符串表示 +inf.
* `limit` - 最多返回这么多个元素. 

## 返回值

Key-Value list.

The key-value list is return as: k1 v1 k2 v2 ...

## 示例

	ssdb 127.0.0.1:8888> hgetall h
	key             value
	-------------------------
	  a               : a
	  b               : b
	  c               : c
	  d               : d
	  e               : e
	  f               : f
	6 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> hscan h a c 10
	key             value
	-------------------------
	  b               : b
	  c               : c
	2 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> 
