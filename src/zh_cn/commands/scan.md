# scan key_start key_end limit

列出处于区间 `(key_start, key_end]` 的 key-value 列表. `("", ""]` 表示整个区间.

这个命令可实现类似通配符 `*` 号的查找, 但是, 仅支持前缀查找, 而且, `*` 必须被省略 - 不要在查询参数里输入 `*` 号!

## 参数

* `key_start` - 返回的起始 key(不包含), 空字符串表示 -inf.
* `key_end` - 返回的结束 key(包含), 空字符串表示 +inf.
* `limit` - 最多返回这么多个元素. 

## 返回值

Key-value List reply.

返回 key value 依次出现的列表.

## 示例

	ssdb 127.0.0.1:8888> scan "" "" 10
	key             value
	-------------------------
	  a               : 1
	  b               : 1
	2 result(s) (0.000 sec)
