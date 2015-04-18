# hlist name_start name_end limit

List hashmap names in range `(name_start, name_end]`.

`("", ""]` means no range limit.

## 参数

* `name_start` - The lower bound(not included) of names to be returned, empty string means -inf(no limit).
* `name_end` - The upper bound(inclusive) of names to be returned, empty string means +inf(no limit).
* `limit` - Up to that many elements will be returned.

## 返回值

Key-Value list.

The key-value list is return as: k1 v1 k2 v2 ...

## 示例

	ssdb 127.0.0.1:8888> hlist "" "" 10
	  a
	  b
	  c
	  d
	  e
	  f
	  h
	  n
	  sess_all
	9 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> hlist a c 10
	  b
	  c
	2 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> 
