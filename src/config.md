# Configuration

<span class="label label-info" style="font-size: 120%;">Notice</span>
<div class="alert alert-info">
    SSDB configuration file uses exactly one TAB to indent for one level, do not use any number of spaces to indent!
</div>

<span class="label label-warning" style="font-size: 120%;">Important</span>
<div class="alert alert-danger">
	DO remember to configure your Linux kernel parameters about <code>max open files</code>, refer to <a href="http://www.cyberciti.biz/faq/linux-increase-the-maximum-number-of-open-files/">[1]</a> and <a href="http://www.lognormal.com/blog/2012/09/27/linux-tcpip-tuning/">[2]</a>. Or you will see error messages like <code>Too many open files</code> in log.txt, or <code>Connection reset by peer</code> on client side.
</div>


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


## Log Configuration

See also [Log Analytics](./logs.html).

### Log levels

The log levels are: `debug, warn, error, fatal`.

Generally, I recommend you set `logger.level` to `debug`.

### Writing logs to console

Edit ssdb.conf, modify

	logger:
		output: log.txt

to

	logger:
		output: stdout


## Memory Usage

A ssdb-server may temporarily consume up to this many memory(in MB):

	cache_size + write_buffer_size * 66 + 32

You can tune the configuration the limit the memory usage of a ssdb-server instance.

---

## Replication

* See also [Replication](./replication.html)
