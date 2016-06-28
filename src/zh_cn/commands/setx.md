# setx key value ttl

设置指定 key 的值内容, 同时设置存活时间.

__注意: 对于已设置过期时间的 key, 再次 set 时, 并不会清除过期时间, 这个和 Redis 的差异你需要留意!__

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
