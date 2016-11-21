# list_allow_ip

__Available since: 1.9.3__

List all allow ip rules.

## 参数

None.

## 返回值

List reply.

## 示例

	ssdb 127.0.0.1:8888> list_allow_ip
	              key
	-----------------
	              all
	1 result(s) (0.000 sec)
	(0.000 sec)
	ssdb 127.0.0.1:8888> add_allow_ip 127.0.0.1
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> list_allow_ip
	              key
	-----------------
	        127.0.0.1
	1 result(s) (0.000 sec)
	(0.000 sec)
	ssdb 127.0.0.1:8888> del_allow_ip 1.1.1.1
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> list_allow_ip
	              key
	-----------------
	        127.0.0.1
	1 result(s) (0.000 sec)
	(0.000 sec)
	ssdb 127.0.0.1:8888> del_allow_ip 127.0.0.1
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> list_allow_ip
	              key
	-----------------
	0 result(s) (0.000 sec)
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
