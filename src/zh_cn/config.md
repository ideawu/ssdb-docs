# 配置

**注意: SSDB 的配置文件使用一个 TAB 来表示一级缩进, 不要使用空格来缩进, 无论你用2个, 3个, 4个, 或者无数个空格都不行!**

## 主从

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

## 主-主(双主)

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

## 内存占用

一个 ssdb-server 实例占用的内存最高达到(MB):

	cache_size + write_buffer_size * 66 + 32

你可以调整配置参数, 限制 ssdb-server 的内存占用.
