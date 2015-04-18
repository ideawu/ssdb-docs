# FLUSHDB [type]

__这个命令实际上并不是一个真正的命令, 它是由 `ssdb-cli` 提供的, 只能在 `ssdb-cli` 中使用.__

删除 SSDB 服务器的所有数据. 可选参数 type 指定删除对应类型的数据.

<span class="label label-danger" style="font-size: 120%;">注意</span>
<div class="alert alert-danger">
	这个命令很危险, 产生的后果不可恢复, 而且会破坏主从状态, 请谨慎使用.
</div>

## 参数

* `type` - 可选参数, 可取值 `kv`, `hash`, `zset`, `list`.

## 返回值

## 示例

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
