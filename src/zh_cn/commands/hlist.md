# hlist name_start name_end limit

列出名字处于区间 (name_start, name_end] 的 hashmap.

("", ""] 表示整个区间.

参见命令 [scan](./scan.html) 对参数的详细解释.

## 参数

* `name_start` - 返回的起始名字(不包含), 空字符串表示 -inf.
* `name_end` - 返回的结束名字(包含), 空字符串表示 +inf.
* `limit` - 最多返回这么多个元素. 

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
