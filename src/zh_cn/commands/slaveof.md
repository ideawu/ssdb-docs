# SLAVEOF id host port [auth last_seq last_key]

__Available since: 1.9.7__

启动一个从库同步进程, 从指定主库同步或者复制数据. 可指定同步点或者复制点.

## 参数

* `id` - 必选，master 库的 id
* `host` - 必选，master 库的主机名或者IP地址
* `port` - 必选，master 库的网络端口
* `auth` - 可选，master 库的验证口令
* `last_seq` - 可选，同步复制的起点 seq
* `last_key` - 可选，如果指定，将从此 key 开始复制 master 的数据

## 返回值

成功返回 `ok`, 否则返回错误码和错误信息.

## 示例

	ssdb 127.0.0.1:8889> slaveof s localhost 8888 "" 990
	              key
	-----------------
	0 result(s) (0.001 sec)
	(0.001 sec)
