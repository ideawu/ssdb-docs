# SLAVEOF id host port [auth last_seq last_key]

__Available since: 1.9.7__

Start a replication slave process, to sync or copy data from a master. You can specify the start of replication seq, and the lower bound of data to copy.

## Parameters

* `id` - required，master's id
* `host` - required，master's hostname or IP address
* `port` - required，master's port
* `auth` - optional，master's auth code
* `last_seq` - optional，the start of replication seq
* `last_key` - optional，the lower bound of data to copy

## Return

Status reply.

## Example

	ssdb 127.0.0.1:8889> slaveof s localhost 8888 "" 990
	              key
	-----------------
	0 result(s) (0.001 sec)
	(0.001 sec)
