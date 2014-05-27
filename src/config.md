# Configuration

<div class="alert alert-info">
    <span class="label label-info">Notice</span>
    SSDB configuration file uses exactly one TAB to indent for one level, do not use any number of spaces to indent!
</div>

## Listen Network

    server:
    	ip: 127.0.0.1
    	port: 8888

The default configuration listen to the `127.0.0.1` local loopback network interface, so other machine will not be able to connect to that ssdb server. If you want to connect to ssdb server from other machine, change `127.0.0.1` to `0.0.0.0`.

Meanwhile, specify with `deny, allow` instructions to only allow connections from reliable IP.

<div class="alert alert-danger">
    <span class="label label-danger">WARNING!</span>
    Listen to <code>0.0.0.0</code> without network restriction is often a security issue, any one can access to your data! You can use iptables as well.
</div>

## Master-Slave

### \#server 1

```
replication:
	slaveof:
```

### \#server 2

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: sync
		ip: 127.0.0.1
		port: 8888
```

## Master-Master

### \#server 1

```
replication:
	slaveof:
		id: svc_2
		# sync|mirror, default is sync
		type: mirror
		ip: 127.0.0.1
		port: 8889
```

### \#server 2

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: mirror
		ip: 127.0.0.1
		port: 8888
```

## Multiple Masters

Within a group of SSDB servers of n instances, each instance must be slaveof other n-1 instances.

## Memory Usage

A ssdb-server may consume up to this many memory(in MB):

	cache_size + write_buffer_size * 66 + 32

You can tune the configuration the limit the memory usage of a ssdb-server instance.