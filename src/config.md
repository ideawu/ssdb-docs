# Configuration

**Notice: SSDB configuration file uses exactly one TAB to indent for one level, do not use any number of spaces to indent!**

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

## Memory Usage

A ssdb-server may consume up to this many memory(in MB):

	cache_size + write_buffer_size * 66 + 32

You can tune the configuration the limit the memory usage of a ssdb-server instance.