# 配置

<div class="alert alert-info">
    <span class="label label-info">注意</span>
    SSDB 的配置文件使用一个 TAB 来表示一级缩进, 不要使用空格来缩进, 无论你用2个, 3个, 4个, 或者无数个空格都不行!
</div>

## 监听网络端口

    server:
    	ip: 127.0.0.1
    	port: 8888

默认的配置文件监听 `127.0.0.1` 本地回路网络, 所以无法从其它机器上连接此 SSDB 服务器. 如果你希望从其它机器上连接 SSDB 服务器, 必须把 `127.0.0.1` 改为 `0.0.0.0`.

同时, 利用配置文件的 `deny, allow` 指令限制可信的来源 IP 访问.

<div class="alert alert-danger">
    <span class="label label-danger">警告!</span>
    如果不做网络限制便监听 <code>0.0.0.0</code> IP 可能导致被任意机器访问到你的数据, 这很可能是一个安全问题! 你可以结合操作系统的 iptables 来限制网络访问.
</div>

## 内存占用

一个 ssdb-server 实例占用的内存最高达到(MB):

	cache_size + write_buffer_size * 66 + 32

你可以调整配置参数, 限制 ssdb-server 的内存占用.

---

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

## 多主

在一组一共包含 n 个实例的 SSDB 实例群中, 每一个实例必须 slaveof 其余的 n-1 个实例.
