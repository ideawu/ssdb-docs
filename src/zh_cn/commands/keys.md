# keys key_start key_end limit

列出处于区间 `(key_start, key_end]` 的 key 列表.

`("", ""]` 表示整个区间.

## 参数

* `key_start` - 返回的起始 key(不包含), 空字符串表示 -inf.
* `key_end` - 返回的结束 key(包含), 空字符串表示 +inf.
* `limit` - 最多返回这么多个元素. 
	
## 返回值

List replay.

返回 key 的列表.

## 示例

	ssdb 127.0.0.1:8888> keys "" "" 10
	              key
	-----------------
	                a
	                b
	2 result(s) (0.000 sec)
