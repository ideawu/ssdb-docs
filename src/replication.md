# Replication Configuration and Monitoring

## Configuration
### Master-Slave

__#server 1__

```
replication:
	slaveof:
```

__#server 2__

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: sync
		ip: 127.0.0.1
		port: 8888
```

### Master-Master

__#server 1__

```
replication:
	slaveof:
		id: svc_2
		# sync|mirror, default is sync
		type: mirror
		ip: 127.0.0.1
		port: 8889
```

__#server 2__

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: mirror
		ip: 127.0.0.1
		port: 8888
```

### Multiple Masters

Within a group of SSDB servers of n instances, each instance must be slaveof other n-1 instances.

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: mirror
		ip: 127.0.0.1
		port: 8888
	slaveof:
		id: svc_2
		# sync|mirror, default is sync
		type: mirror
		ip: 127.0.0.1
		port: 8889
	# ... more slaveof
```

## Monitor the Replication Status

### Information by info command

	ssdb 127.0.0.1:8899> info
	binlogs
        capacity : 10000000
        min_seq  : 1
        max_seq  : 74
	replication
	    client 127.0.0.1:55479
	        type     : sync
	        status   : SYNC
	        last_seq : 73
	replication
	    slaveof 127.0.0.1:8888
	        id         : svc_2
	        type       : sync
	        status     : SYNC
	        last_seq   : 73
	        copy_count : 0
	        sync_count : 44

__binlogs__

Describes the status of write operations on this instance.

* capacity: the maximum count of binlogs in the queue.
* min_seq: currently minimum seq of binlog in the queue.
* max_seq: currently maximum seq of binlog in the queue.

__replication__

There could be multiple `replication` sections. Each describes a connected slave(*client*) or connecting to a master(*slaveof*).

* slaveof|client ip:port, the remote master/slave's ip:port.
* type: `sync|mirror`.
* status: replication status, `DISCONNECTED|INIT|OUT_OF_SYNC|COPY|SYNC`.
* last_seq: seq of the last binlog sent or received.
* slaveof.id: the master's id(from the slave's view, you never configure a master'id in the master itself).
* slaveof.copy_count: number of keys copied during a full replication from the master.
* slaveof.sync_count: number of binglogs sent or received.

About status:

* DISCONNECTED: normally, this means the network is broken.
* INIT: init.
* OUT_OF_SYNC: because the master receives too many writes, the slave could not catch up with the binlog, it will restart the replication from beginning.
* COPY: the base data is being copied, new write may not be replicated immediately.
* SYNC: the replication is healthy.

### To determine the replication status

__For a master node__, the `binlogs.max_seq` tells the seq of the latest one write(set/update/delete) operation on this instance, and `replication.client.last_seq` tells the seq of the last one opteration that had been sent to the slave.

So, if you want to know whether the replication between master and slave is up to date, check out if `binlogs.max_seq` is equal to `replication.client.last_seq`.

