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

## Replication

* See also [Replication](./replication.html)

---

## Log Configuration

See also [Log Analytics](./logs.html).

* __`logger.level` Log Levels__

The log levels are: `debug, warn, error, fatal`.

Generally, I recommend you set `logger.level` to `debug`.

* __`logger.output` 日志输出__

Can be relative path or absolute path, if relative path is set, it is relative to the directory of the ssdb.conf file.

If you want to writing logs to console, edit ssdb.conf, modify

	logger:
		output: log.txt

to

	logger:
		output: stdout


* __`logger.rorate.size` Logrotate and Cleanup__

Sets the max size of log file in bytes. Log files will be cut into 1000MB size files, the names are in the form of: `log.txt.20150723-230422`.

__The rotated files will not be deleted automatically, you need to write a crontab script to deleted unused files yourself.__

---

## Memory Usage

A ssdb-server may temporarily(only last for short time) consume up to this many memory(in MB):

	cache_size + write_buffer_size * 66 + 32

This is for `compression` is set to `no`, if `compression` is set to `yes`, it would be:

	cache_size + 10 * write_buffer_size * 66 + 32

You can tune the configuration to limit the memory usage of a ssdb-server instance.
