# 配置

<span class="label label-success" style="font-size: 120%;">注意</span>
<div class="alert alert-info">
    SSDB 的配置文件使用一个 TAB 来表示一级缩进, 不要使用空格来缩进, 无论你用2个, 3个, 4个, 或者无数个空格都不行!
</div>

<span class="label label-warning" style="font-size: 120%;">重要</span>
<div class="alert alert-danger">
	一定要记得修改你的 Linux 内核参数, 关于 <code>max open files(最大文件描述符数)</code>的内容, 请参考 <a href="http://www.ideawu.net/blog/archives/740.html">[1]</a>. 否则, 你会在 log.txt 看到 <code>Too many open files</code> 类似的错误, 或者在客户端看到 <code>Connection reset by peer</code> 错误.
</div>

## 监听网络端口

    server:
    	ip: 127.0.0.1
    	port: 8888

默认的配置文件监听 `127.0.0.1` 本地回路网络, 所以无法从其它机器上连接此 SSDB 服务器. 如果你希望从其它机器上连接 SSDB 服务器, 必须把 `127.0.0.1` 改为 `0.0.0.0`.

同时, 利用配置文件的 `deny, allow` 指令限制可信的来源 IP 访问.

<span class="label label-danger" style="font-size: 120%;">警告!</span>
<div class="alert alert-danger">
    如果不做网络限制便监听 <code>0.0.0.0</code> IP 可能导致被任意机器访问到你的数据, 这很可能是一个安全问题! 你可以结合操作系统的 iptables 来限制网络访问.
</div>


## 日志配置

另外参见 [日志分析](./logs.html).

### 日志级别

支持的日志级别有: `debug, warn, error, fatal`.

一般, 建议你将 `logger.level` 设置为 `debug` 级别.

### 输出日志到终端屏幕

编辑 ssdb.conf, 将

	logger:
		output: log.txt

修改为

	logger:
		output: stdout


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
