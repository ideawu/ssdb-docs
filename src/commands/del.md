# del key

Delete specified key.

## Parameters

* `key` - 

## Return Value

Status reply. You can not determine whether the key exists or not by delete command.

## Example

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> del a
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
