# FAQ - 常见问题

* __问: 这里没有我想问的问题和答案, 我应该怎么办?__

 > __答:__ 我推荐所有人通过学习文档和使用自己大脑思考来回答自己的问题.

 > 如果你经过学习文档, 并且进行充分思考后, 仍然无法得到答案, 你可以到 Github 上提 issue.

 > 注意, 作为一个技术产品的用户, 一个互联网工作者, 甚至是一个程序员, 你应该学会基本的提问技能. 如果你的提问没有得到回答, 那么责任不在被问者, 而在于你自己, 你自己没有__像个正常的技术人那样正确地提问__.



## 运维
-----

* __问: 如何设置 SSDB 的内存占用上限?__

 > __答: 很抱歉, SSDB 设置指定内存占用上限. 在文档 [https://ssdb.io/docs/zh_cn/config.html](https://ssdb.io/docs/zh_cn/config.html) 介绍了内存相关的内容, 你可以看看.__

* __问: 我在进行压测(或者导数据), 起了1000个线程(或进程)来写数据, 为什么隔一会就会阻塞?__

 > __答:__ 如果你在短时间大量写数据(例如压测, 导几十G的数据), 就会如此. 设计如此, 你无法改变, 只能规避. 规避的方法是自己减慢导数据的速度, 同时在连接时, 设置更大的超时时间. 另外, 你还可以更换成性能更快的硬盘.

* __问: 为什么我在本机可以访问 SSDB 服务器, 在其它机器却不能呢? 提示 Connection refused.__

> __答:__ 默认的配置文件基于安全考虑, 只开放给本机访问. 如果你想开放给网络上的其它 IP 访问, 请按文档 [https://ssdb.io/docs/zh_cn/config.html](https://ssdb.io/docs/zh_cn/config.html) 修改配置.

* __问: 为什么并发数上不去? 服务器报错 Too many open files, 客户端报错 Connection reset by peer.__

 > __答:__ 请参考文档 [https://ssdb.io/docs/zh_cn/config.html](https://ssdb.io/docs/zh_cn/config.html) 进行配置.

* __问: 我把一个, 两个, 或者所有的 key 都删除了, 为什么 SSDB 占用的内存和磁盘空间并没有释放?__

 > __答:__ SSDB 有自己策略来决定何时释放或者是否释放内存和硬盘占用, 你不能要求 SSDB _立即或者在未来某个时间, 或者基于某个条件_ 释放这些空间. 而且, 即使数据库清空了, SSDB 仍然会保留一些信息, 因此仍然占用部分硬盘空间. 你不应该关心这个问题.

* __问: 我用 info 命令查到 dbsize 是 1G, 为什么用系统的 du 命令查看, 却占用 2G 空间呢?__

 > __答:__ 注意, dbsize 是参考值, 和实际相比可能差距比较大, 应以 data 目录为准. 另外, SSDB 还会产生日志文件占用硬盘空间, 你可以根据文档中的相关内容删除不用的日志文件.

* __问: 为什么 SSDB 偶尔会使用 100% CPU?__

 > __答:__ SSDB __偶尔__使用 100% CPU 是完全__正常的__, 请不要大惊小怪. 这是因为 SSDB/LevelDB 在进行数据库整理(Compaction)操作, 持续的时间一般随着数据变大而变长, 一般只持续数秒.

* __问: 为什么 SSDB 偶尔会使用较多磁盘 IO?__

 > __答:__ SSDB __偶尔__使用较多磁盘 IO 是完全__正常的__, 请不要大惊小怪. 这是因为 SSDB/LevelDB 在进行数据库整理(Compaction)操作, 持续的时间一般随着数据变大而变长, 一般只持续数秒.

* __问: 为什么 SSDB 偶尔会使用较多内存空间, 然后又降下来?__

 > __答:__ SSDB 使用的内存空间是变动的, 可能忽高忽低. 使用的内存空间的上限在文档 [https://ssdb.io/docs/zh_cn/config.html](https://ssdb.io/docs/zh_cn/config.html) 中有描述.

* __问: Compaction 时服务会有稍微变慢, 我能设定 Compaction 执行的时间吗?__

 > __答:__ 很遗憾, 你不能设定 Compaction 在何时执行, SSDB/LevelDB 有自己策略和机制, 决定何时应该进行 Compaction. 根据大多数用户的使用反馈, Compaction 对服务没有任何影响.

* __问: 我原来的配置文件中没有打开压缩选项(compression: no), 我能中途把 compression 改为 yes 吗?__

 > __答:__ 是的, 你可以在任何时候修改 compression 选项, 只要你重启 ssdb-server, 新的修改就能生效. 更改后, 原来的数据依然兼容, 不会有任何问题.

* __问: 我开启了压缩选项, 但 SSDB 的硬盘占用并没有变小, 这是怎么回事?__

 > __答:__ 无论你开启或者关闭压缩选项, 只要重启后, 新的选项就已经生效了. 但是, 新的选项不一定立即影响原来的旧数据, SSDB 会在合适的时候将新选项应用于旧数据, 你无法控制这一点.

* __问: 我的 SSDB 实例莫名其妙就退出了, 请问是什么原因?__

 > __答:__ 进程莫名退出, 一般是如下原因:

 > 1. max open files配置, 参见[配置相关文档](https://ssdb.io/docs/zh_cn/config.html)
 > 2. 硬件内存不足, 操作系统内核kill掉进程, `cat /var/log/messages | grep 'Out of'`
 > 3. 程序bug
 > 4. 其它的


## 命令和用法
-----

* __问: 有命令可以知道 SSDB 中存储的 key 总数吗?__

 > __答:__ 如果你想统计的是 KV 的数量, 那么, 在一开始时, 你就要把所有 KV 都放在同一个 HASH 中, 然后通过 [hsize](./commands/hsize.html) 命令就可以得到 key 的数量了. 如果一开始你没有这么做, 或者你想统计 KV 以外的数量, 那么答案很简单 - 没有这样的单个命令(除非你自己写脚本遍历统计).

* __问: SSDB 支持 key 查找吗? 支持通配符 * 模糊查找吗?__

 > __答:__ SSDB 支持, 且__仅__支持__前缀区间__查找, 也就是类似`a*`这样的查找, 而不支持 `*a`, `*a*` 或者其它的模糊查找. 具体用法请参见命令: [scan](./commands/scan.html), [hlist](./commands/hlist.html), [keys](./commands/keys.html), [hkeys](./commands/hkeys.html), [hscan](./commands/hscan.html), [zlist](./commands/zlist.html), [zkeys](./commands/zkeys.html), [zscan](./commands/zscan.html), [qlist](./commands/qlist.html) 的文档.

 > __注意, 这些命令都要求你省略 `*` 号!__

 > __注意, 区间搜索的意思是, 只要比下限大同时比上限小, 即使不是指定前缀, 也会返回!__

* __问: SSDB 不支持 sets 集合吗? Redis 的 sadd, sdiff 等求交集, 并集命令我都用不了了?__

 > __答:__ SSDB 不支持 sets, 以后也不太可能支持, 因为有替代方案. 你可以用 hash 来替代 sets, 因为一个 hash 的 key 是唯一的, 可以实现集合的特性. 至于交集, 并集等操作, 你只能自己实现. 例如, 求交集, 你可以遍历第一个 hash 的 key, 然后和第二个 hash 对比, 把结果存入第三个 hash.

* __问: 我的 key 是数字, 为什么在 SSDB 里不是按数字大小排序的?__

 > __答:__ 非常多的人在这里遇到不解, 这主要是没有深刻意识到, SSDB 是按 key 的字节顺序排序(字符串比较顺序), 我们平常认为 2 小于 100, 但是, 如果是字符串, 2 是大于 100 的, 因为字符串比较顺序是从左到左逐个字节进行比较.

 > 为了达到你想要的效果, 你可以给数字加上 0 作为前缀, 补齐为固定长度的字符串, 例如把 2 变为 002, 那么 002 就小于 100, 符合你的预期. 一般来说, 要根据你的具体情况选择要补齐的最终长度.

* __问: 我知道一个 key, 怎么知道这个 key 的类型? 也就是说, 有没有 Redis 那样的 type 命令?__

 > __答:__ 注意, 这是 SSDB 和 Redis 的关键区别. 对于 SSDB 来说, 需要先区分数据类型, 然后再取名字(key). 也就是说, 不同类型的 key 是可以相同的. 所以, 你必须先知道类型, 才能知道 key. 如果你知道 key 而不知道类型, 说明你弄错了.

* __问: 如何遍历整个 SSDB 数据库?__

 > __答: 见 [https://github.com/ideawu/ssdb/blob/dev/tools/ssdb-iterate.php](https://github.com/ideawu/ssdb/blob/dev/tools/ssdb-iterate.php)__


## 配置
-----

* __问: 我用 Twemproxy 配置 SSDB 做负载均衡和集群, 但是当我用 ssdb-cli 连接 Twemproxy 时, 会报错, 为什么?__

 > __答:__ 因为 Twemproxy 不支持 SSDB 网络协议, 所以, 你只能使用 redis-cli 连接 Twemproxy. 注意, 你可以用 ssdb-cli 或者 redis-cli 连接 SSDB, 那是因为 SSDB 支持两种协议, 而 Twemproxy 只支持一种.

* __问: 如何在一台机器上部署多个 SSDB 实例?__

 > __答:__ 每一个实例使用不同的配置文件进行启动, 而且, 配置文件里的 `work_dir` `server.port` 不能相同, 也就是每个实例的数据库存储路径, 以及监听端口. 如果 `pidfile` `logger.output` 使用的是绝对路径, 也要保证不能相同, 如果是相对路径, 由不需要, 因为默认跟随 `work_dir` 而不同了.


## 主从同步
-----

* __问: 对于多主, 或者主从集群, 如何恢复数据?__

 > __答:__ 对于多主, 或者主从集群, 恢复数据时以及集群的维度来恢复. 具体步骤是:

 > 1. 部署一个空数据的集群(也就是说, 所有节点必须不包含任何数据)
 > 2. 把备份的数据导入集群中的一台master(如有多master, 也只一台)

* __问: 我想给主从集群新加入一台新的从节点(slave), 应该如何操作?__

 > __答:__ 方法有两种, 根据你的情况选择:

 > 1. 启动一台空的节点, 在启动前, 配置其指向 master 即可. 这种方案最简单.
 > 2. 这种方案比较复杂, 你需要非常小心进行, 不要操作的时候和你的理解出现偏差! 这种方案是, 选择原来的一个 slave 节点, 停止它. 然后将这个节点的 meta data 两个目录连同配置文件复制到新机器, 然后启动新节点.

* __问: 如何快速的建立一个新的从节点(Slave)?__

 > __答:__ 建立新的从节点的速度，无法突破硬件的物理限制，这个限制主要是网络带宽和硬盘性能。在无法突破限制的前提下，有一种特殊的方法可尝试:

 > 1. 在 master 相同的机器上，建立一个新的 slave.
 > 2. 把刚刚建好，已达到 SYNC 状态的 slave 停止，然后 scp 实例的目录(包括全部配置文件和数据文件)到新的机器.
 > 3. 在新机器启动 slave.

* __问: 我的 master 占用的硬盘空间是 100G, 但 slave 只占用 30G, 是不是有问题?__

 > __答:__ 主和从占用的硬盘空间不一致, 甚至相差很多, 不能得出有问题的结论. 如果你认为有问题, 你需要通过硬盘占用之外的其它信息来发现问题.

* __问: 我 Bla bla bla 说了一堆废话, 为什么主从没有同步?__

 > __答:__ 确定主从是否同步的__唯一__方法是:

 > [https://ssdb.io/docs/zh_cn/replication.html](https://ssdb.io/docs/zh_cn/replication.html) 执行 info 命令, 判断 binlogs.max_seq 和 replication.client.last_seq 是否相等.

* __问: 我有双主: A 和 B, 如果我同时往 A 和 B 上更新同一个 key...__

 > __答:__ 停! SSDB 禁止你这么做! 你不能往多个节点写同一个 key, 你必须自己将 key 哈希到唯一的一个节点上, 保证对这个 key 的操作只会永远落在这个节点上.

* __问: __

 > __答:__
