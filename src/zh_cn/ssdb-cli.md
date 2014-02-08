# 命令行工具 ssdb-cli

SSDB 的命令行工具 ```ssdb-cli``` 对于 SSDB 的管理非常有用, 你可以用它来执行所有的命令, 监控服务的状态, 清除整个数据库, 等等.

## 连接到 SSDB 服务器

	$ /usr/local/ssdb/ssdb-cli -h 127.0.0.1 -p 8888
    ssdb (cli) - ssdb command line tool.
    Copyright (c) 2012-2013 ideawu.com
    
	'h' or 'help' for help, 'q' to quit.
    
	ssdb 127.0.0.1:8888>

输入 'h', 然后按```回车```查看帮助信息. 下面是操作的演示:

	ssdb 127.0.0.1:8888> set k 1
    ok
    (0.000 sec)
    ssdb 127.0.0.1:8888> get k
    1
    (0.000 sec)
    ssdb 127.0.0.1:8888> del k
    ok
    (0.000 sec)
    ssdb 127.0.0.1:8888> get k
    error: not_found
    (0.000 sec)
    ssdb 127.0.0.1:8888>

## 监控 SSDB 实例的状态

### info

命令 ```info``` 显示了数据在 SSDB 中的分布情况, 还有 LevelDB 的健康程度.

	ssdb 127.0.0.1:8899> info
	version
		1.6.7
	key_range.kv
		"TES10" - "TEST999926"
	key_range.hash
		"" - ""
	key_range.zset
		"" - ""
	leveldb.stats
                                      Compactions
        Level  Files Size(MB) Time(sec) Read(MB) Write(MB)
        --------------------------------------------------
          0        0        0         1        0       103
          1        0        0         3      202       361
          2        8      253        18      938       928
	
	11 result(s) (0.001 sec)

__key\_range.*__

不同数据类型的 key 在 SSDB 中是排序的, 所以这个信息表示不同数据类型的最小 key 和最大 key.

__leveldb.stats__

这个信息显示了 LevelDB 每一层级的文件数量和文件总大小. 越小的层级如果文件越小, 那么数据库就越健康(查询更快速).

### info cmd

	ssdb 127.0.0.1:8899> info cmd
	version
		1.6.7
	cmd.get
		calls: 20000	time_wait: 27	time_proc: 472
	cmd.set
		calls: 267045	time_wait: 7431	time_proc: 7573
	cmd.setx
		calls: 111100	time_wait: 3663	time_proc: 6456
	cmd.del
		calls: 0	time_wait: 0	time_proc: 0

__cmd.*__

* calls: 该命令总共处理了多少次.
* time_wait: 命令在被处理前等待的总共时间(单位毫秒).
* time_proc: 命令处理总共消耗的时间(单位毫秒).

### compact

这个命令强制 SSDB 服务器对数据进行收缩(compaction), 收缩之后, 操作通常会变得更快.
