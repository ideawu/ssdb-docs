# add_allow_ip rule

__Available since: 1.9.3__

添加一条允许连接的 ip 规则.

<div class="alert alert-warning">
警告: 当你用这些命令修改了 IP 过滤规则后, 需要同时修改配置文件! 因为重启 ssdb-server 时会从配置文件中重新加载.
</div>

## 参数

* `rule` - IP 地址过滤规则, 只前缀, 如 `127.0.1`, `127.0`, 等等.

## 返回值

Status reply.

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
