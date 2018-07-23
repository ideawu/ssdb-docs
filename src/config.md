# Configuration

<span class="label label-info" style="font-size: 120%;">Notice</span>
<div class="alert alert-info">
    SSDB configuration file uses exactly one TAB to indent for one level, do not use 2, 3, 4, 5, 6, 7, 8 or any other number of spaces to indent!
</div>

<span class="label label-warning" style="font-size: 120%;">Important</span>
<div class="alert alert-danger">
	DO remember to configure your Linux kernel parameters about <code>max open files</code>, refer to <a href="http://www.cyberciti.biz/faq/linux-increase-the-maximum-number-of-open-files/">[1]</a> and <a href="http://www.lognormal.com/blog/2012/09/27/linux-tcpip-tuning/">[2]</a>. Or you will see error messages like <code>Too many open files</code> in log.txt, or <code>Connection reset by peer</code> on client side.
</div>

PS: Use [c1000k](https://github.com/ideawu/c1000k) to test how many concurrent connections your system supports.

---

## Listen Network

	server:
    	ip: 127.0.0.1
    	port: 8888

The default configuration listen to the `127.0.0.1` local loopback network interface, so other machine will not be able to connect to that ssdb server. If you want to connect to ssdb server from other machine, change `127.0.0.1` to `0.0.0.0`.

Meanwhile, specify with `deny, allow` instructions to only allow connections from reliable IP.

<span class="label label-danger" style="font-size: 120%;">WARNING!</span>
<div class="alert alert-danger">
    Listen to <code>0.0.0.0</code> without network restriction is often a security issue, any one can access to your data! You can use iptables as well.
</div>

---

## Readonly mode

	server:
    	readonly: yes|no

SSDB server can be configured as readonly mode, if SSDB is running in readonly mode, any write operation command will rejected by the server:

	ssdb 127.0.0.1:8888> set a 2
	client_error: Forbidden Command: set
	(0.000 sec)

The default option is not set, that is SSDB server works in readwrite mode.

---

## Replication

* See also [Replication](./replication.html)

---

## Log Configuration

See also [Log Analytics](./logs.html).

* __`logger.level` Log Levels__

The log levels are: `debug, info, warn, error, fatal`.

Generally, I recommend you set `logger.level` to `debug`.

* __`logger.output` Log Output Destination__

Can be relative path or absolute path, if relative path is set, it is relative to the directory of the ssdb.conf file.

If you want to write logs to console, edit ssdb.conf, modify

	logger:
		output: log.txt

to

	logger:
		output: stdout


* __`logger.rorate.size` Logrotate and Cleanup__

Sets the max size of log file in bytes. Log files will be cut into 1000MB size files, the names are in the form of: `log.txt.20150723-230422`.

__The rotated files will not be deleted automatically, you need to write a crontab script to deleted unused files yourself.__


---

## LevelDB Configurations

* __`leveldb.cache_size` Max memory usage for caching data, in MB__

Set this item to a large number will normally give better performance, usually half of the physical memory. If your server has less memory, set it to a smaller number, the minimum number is 16.

* __`leveldb.block_size` Don't bother with this number__

* __`leveldb.write_buffer_size` Write buffer size, in MB__

If your server has less memory, set it to a smaller number, vice verse. It should be between `[4, 128]`;

* __`leveldb.compaction_speed`__

Normally, you should not change this. If you have a slower disk and most of your data will never be updated and new data barely be inserted, set it to a smaller number(better to be greater than 50).

* __`leveldb.compression` Compress data before they are written to disk__

You SHOULD let it be `yes`! Normally you will be able to store 10 times disk space of data, and have better performance, if you set it to `yes`.


---


## Memory Usage

A ssdb-server may temporarily(only last for short time) consume up to this many memory(in MB):

	cache_size + write_buffer_size * 66 + 32

This is for `compression` is set to `no`, if `compression` is set to `yes`, it would be:

	cache_size + 10 * write_buffer_size * 66 + 32

You can tune the configuration to limit the memory usage of a ssdb-server instance.

Users reported that with default configuration, the memory usage is about 1GB, you can refer to this.

### Memory Usage Limitation?

Sorry, you cannot set the maximum memory usage of SSDB. SSDB may use memory according to these facts:

1. `cache_size` configuration, the most important fact.
2. the number of client connections. Usually each connection will use 2MB memory, but busy connections will use even more.
3. system file cache. Although the memory usage is count on ssdb-server, but the OS may cut it off if neccessary. The memory usage may count to several tens GB.
4. the more busy SSDB is, the more memory it will use.

`cache_size` is what you can control, but you can not control others. With a SSDB instance running on a 16G physical memory machine, you set `cache_size` to 8000(8G), then you may find the process ssdb-server may use 12G RES memory with top command. If the instance is very busy, it may use 15G RES memory as well.
