# add_allow_ip rule

__Available since: 1.9.3__

Add one allow ip rule.

<div class="alert alert-warning">
Warning: After you have modify any allow/deny rule, you must modify both the configuration file! Or the rules will be reload from configuration file after you restart ssdb-server.
</div>

## Parameters

* `rule` - IP address filter rule, specify only the prefix, `127.0.1`, `127.0`, etc.

## Return Value

Status reply.

## Examples

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
