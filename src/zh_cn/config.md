# 配置

<span class="label label-success" style="font-size: 120%;">注意</span>
<div class="alert alert-info">
    SSDB 的配置文件使用一个 TAB 来表示一级缩进, 不要使用空格来缩进, 无论你用1个, 2个, 3个, 4个, 5个, 6个, 7个, 8个或者无数个空格都不行!
</div>

<span class="label label-warning" style="font-size: 120%;">重要</span>
<div class="alert alert-danger">
	一定要记得修改你的 Linux 内核参数, 关于 <code>max open files(最大文件描述符数)</code>的内容, 请参考 <a href="http://www.ideawu.net/blog/archives/740.html">[1]</a>. 否则, 你会在 log.txt 看到 <code>Too many open files</code> 类似的错误, 或者在客户端看到 <code>Connection reset by peer</code> 错误.
	<br/><br/>
	禁止使用 CentOS 7, 除非你确保自己完全理解 CentOS 7 相对于 CentOS 6 或者其它 Linux 发行版做了哪些不合理的改变, 否则, 你将无法正确配置 max open files 相关的选项, 相信我, 你无法搞定 CentOS 7(也许是 <code>/etc/security/limits.d/90-nproc.conf</code> 相关).
</div>

PS: 使用这个 [c1000k](https://github.com/ideawu/c1000k) 工具来测试你的系统最多支持多少并发连接.

---

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

---

## 同步和复制

* 参见 [同步和复制](./replication.html)

---

## 日志配置

另外参见 [日志分析](./logs.html).

* __`logger.level` 日志级别__

支持的日志级别有: `debug, warn, error, fatal`.

一般, 建议你将 `logger.level` 设置为 `debug` 级别.

* __`logger.output` 日志输出__

可直接写相对路径或者绝对路径, 如果相对路径, 则是相对配置文件所在的目录.

如果你想输出日志到终端屏幕, 编辑 ssdb.conf, 将

	logger:
		output: log.txt

修改为

	logger:
		output: stdout

* __`logger.rorate.size` 日志循环和清理__

设置日志拆分时的大小, 单位为字节数. 按照默认的配置, 日志会按 1000MB 大小进行切分, 切分后的文件名格式如: `log.txt.20150723-230422`.

__切分后的日志文件不会自动被清理, 你需要自己写 crontab 脚本来清理.__


---

## LevelDB 配置

* __`leveldb.cache_size` 内存缓存大小__

一般地, 这个数字越大, 性能越好. 如果你的机器内存较小, 那就把它改小, 最小值是 16.

* __`leveldb.block_size` 不用关心__

* __`leveldb.write_buffer_size` 写缓冲区大小__

如果你的机器内存小, 那就把它改小, 否则改大. 它应该在这个范围内: `[4, 128]`;

* __`leveldb.compaction_speed`__

一般情况下, 不用关心. 如果你的硬盘性能非常差, 同时, 你的数据几乎不变动, 也没有什么新数据写入, 可以把它改小(最好大于 50).

* __`leveldb.compression` 压缩硬盘上的数据__

最好设置为 `yes`! 如果是 `yes`, 一般你能存储 10 倍硬盘空间的数据, 而且性能会更好.


---

## 内存占用

一个 ssdb-server 实例占用的内存__瞬时__(有可能, 而且即使达到, 也只是持续短时间)最高达到(MB):

	cache_size + write_buffer_size * 66 + 32

这是对于压缩选项没有开启的情况, 如果 `compression: yes`, 计算公式是:

	cache_size + 10 * write_buffer_size * 66 + 32

你可以调整配置参数, 限制 ssdb-server 的内存占用.
