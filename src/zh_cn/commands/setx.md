# setx key value ttl

设置指定 key 的值内容, 同时设置存活时间.

## 参数

* `key` - 
* `value` - 
* `ttl` - 存活时间(秒).

## 返回值

Status reply.

## 示例

	ssdb 127.0.0.1:8888> setx a val 3
	ok
	(0.000 sec)
