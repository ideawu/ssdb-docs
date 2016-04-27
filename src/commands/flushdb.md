# flushdb [type]

__This command is not a real command until 1.9.2, before that, it is provided by `ssdb-cli`, not on the server side.__

Delete all data in ssdb server. if type is provided, delete all data of specific type.

<span class="label label-danger" style="font-size: 120%;">WARNING!</span>
<div class="alert alert-danger">
	This operation is DANGEROUS and is not recoverable, and will break replication states, you must fully understand the RISK before you use it!
</div>

## Parameters

* `type` - optional, could be `kv`, `hash`, `zset`, `list`.

## Return Value

None.

## Examples

	ssdb 127.0.0.1:8888> flushdb
	
	============================ DANGER! ============================
	This operation is DANGEROUS and is not recoverable, if you
	really want to flush the whole db(delete ALL data in ssdb server),
	input 'yes' and press Enter, or just press Enter to cancel
	
	flushdb will break replication states, you must fully understand
	the RISK before you doing this!
	
	> flushdb? yes
	Begin to flushdb...
	
	delete[hash] 0 hash(s), 0 key(s).
	delete[zset] 0 zset(s), 0 key(s).
	delete[list] 0 list(s), 0 key(s).
	
	===== flushdb stats =====
	[kv]          0 key(s).
	[hash]        0 hash(s),        0 key(s).
	[zset]        0 zset(s),        0 key(s).
	[list]        0 list(s),        0 key(s).
	
	clear binlog
	
	compacting...
	done.
	
	(2.895 sec)
	ssdb 127.0.0.1:8888> 
