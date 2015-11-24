# 同步和复制的配置与监控

## 配置

<div class="alert alert-info">
	对于老版本, 你必须通过 <code>slaveof.ip</code> 指定 master 的 IP 地址, 但对于新版本(1.9.2+), 你可以通过 <code>slaveof.host</code> 指定 master 的主机名(域名).
</div>

### 主-从

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
		# use ip for older version
		#ip: 127.0.0.1
		# use host since 1.9.2
		host: localhost
		port: 8888
```

### 主-主

__#server 1__

```
replication:
	slaveof:
		id: svc_2
		# sync|mirror, default is sync
		type: mirror
		# use ip for older version
		#ip: 127.0.0.1
		# use host since 1.9.2
		host: localhost
		port: 8889
```

__#server 2__

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: mirror
		# use ip for older version
		#ip: 127.0.0.1
		# use host since 1.9.2
		host: localhost
		port: 8888
```

### 多主

在一组一共包含 n 个实例的 SSDB 实例群中, 每一个实例必须 slaveof 其余的 n-1 个实例.

```
replication:
	slaveof:
		id: svc_1
		# sync|mirror, default is sync
		type: mirror
		# use ip for older version
		#ip: 127.0.0.1
		# use host since 1.9.2
		host: localhost
		port: 8888
	slaveof:
		id: svc_2
		# sync|mirror, default is sync
		type: mirror
		# use ip for older version
		#ip: 127.0.0.1
		# use host since 1.9.2
		host: localhost
		port: 8889
	# ... more slaveof
```

## 监控同步状态

### info 命令返回的信息

	ssdb 127.0.0.1:8899> info
	binlogs
        capacity : 10000000
        min_seq  : 1
        max_seq  : 74
	replication
	    client 127.0.0.1:55479
	        type     : sync
	        status   : SYNC
	        last_seq : 74
	replication
	    slaveof 127.0.0.1:8888
	        id         : svc_2
	        type       : sync
	        status     : SYNC
	        last_seq   : 10023
	        copy_count : 0
	        sync_count : 44

__binlogs__

当前实例的写操作状态.

* capacity: binlog 队列的最大长度
* min_seq: 当前队列中的最小 binlog 序号
* max_seq: 当前队列中的最大 binlog 序号

__replication__

可以有多条 `replication` 记录. 每一条表示一个连接进来的 slave(*client*), 或者一个当前服务器所连接的 master(*slaveof*).

* slaveof|client host:port, 远端 master/slave 的 host:port.
* type: 类型, `sync|mirror`.
* status: 当前同步状态, `DISCONNECTED|INIT|OUT_OF_SYNC|COPY|SYNC`.
* last_seq: 上一条发送或者收到的 binlog 的序号.
* slaveof.id: master 的 id(这是从 slave's 角度来看的, 你永远不需要在 master 上配置它自己的 id).
* slaveof.copy_count: 在全量同步时, 已经复制的 key 的数量.
* slaveof.sync_count: 发送或者收到的 binlog 的数量.

关于 status:

* DISCONNECTED: 与 master 断开了连接, 一般是网络中断.
* INIT: 初始化状态.
* OUT_OF_SYNC: 由于短时间内在 master 有大量写操作, 导致 binlog 队列淘汰, slave 丢失同步点, 只好重新复制全部的数据.
* COPY: 正在复制基准数据的过程中, 新的写操作可能无法及时地同步.
* SYNC: 同步状态是健康的.

### 判断同步状态

__对于 master__, `binlogs.max_seq` 是指当前实例上的最新一次的写(写/更新/删除)操作的序号, `replication.client.last_seq` 是指已发送给 slave 的最新一条 binlog 的序号.

所以, 如果你想判断主从同步是否已经同步到位(实时更新), 那么就判断 `binlogs.max_seq` 和 `replication.client.last_seq` 是否相等.
