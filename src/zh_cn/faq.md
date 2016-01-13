# FAQ - 常见问题

* __问: 这里没有我想问的问题和答案, 我应该怎么办?__

> __答:__ 我推荐所有人通过学习文档和使用自己大脑思考来回答自己的问题.  

> 如果你经过学习文档, 并且充分进行思考后, 仍然无法得到答案, 你可以到 Github 上提 issue.  

> 注意, 作为一个技术产品的用户, 一个互联网工作者, 甚至是一个程序员, 你应该学会基本的提问技能. 如果你的提问没有得到回答, 那么责任不在被问者, 而在于你自己, 你自己没有__像个正常的技术人那样正确地提问__.  

-----

* __问: 为什么我在本机可以访问 SSDB 服务器, 在其它机器却不能呢? 提示 Connection refused.__

> __答:__ 默认的配置文件基于安全考虑, 只开放给本机访问. 如果你想开放给网络上的其它 IP 访问, 请按文档 [http://ssdb.io/docs/zh_cn/config.html](http://ssdb.io/docs/zh_cn/config.html) 修改配置.

* __问: 为什么并发数上不去? 服务器报错 Too many open files, 客户端报错 Connection reset by peer.__

 > __答:__ 请参考文档 [http://ssdb.io/docs/zh_cn/config.html](http://ssdb.io/docs/zh_cn/config.html) 进行配置.

* __问: 我把一个, 两个, 或者所有的 key 都删除了, 为什么 SSDB 占用的内存和磁盘空间并没有释放?__

 > __答:__ SSDB 有自己策略来决定何时释放内存和硬盘占用, 你不能要求 SSDB _立即_ 释放这些空间. 而且, 即使数据库清空了, SSDB 仍然会保留一些信息, 因此仍然占用部分硬盘空间. 你不应该关心这个问题.

* __问: 为什么 SSDB 偶尔会使用 100% CPU?__

 > __答:__ SSDB __偶尔__使用 100% CPU 是完全__正常的__, 请不要大惊小怪. 这是因为 SSDB/LevelDB 在进行数据库整理(Compaction)操作, 持续的时间一般随着数据变大而变长, 一般只持续数秒.

* __问: 为什么 SSDB 偶尔会使用较多磁盘 IO?__

 > __答:__ SSDB __偶尔__使用较多磁盘 IO 是完全__正常的__, 请不要大惊小怪. 这是因为 SSDB/LevelDB 在进行数据库整理(Compaction)操作, 持续的时间一般随着数据变大而变长, 一般只持续数秒.

* __问: 为什么 SSDB 偶尔会使用较多内存空间, 然后又降下来?__

 > __答:__ SSDB 使用的内存空间是变动的, 可能忽高忽低. 使用的内存空间的上限在文档 [http://ssdb.io/docs/zh_cn/config.html](http://ssdb.io/docs/zh_cn/config.html) 中有描述.

* __问: Compaction 时服务会有稍微变慢, 我能设定 Compaction 执行的时间吗?__

 > __答:__ 很遗憾, 你能设定 Compaction 在何时执行, SSDB/LevelDB 有自己策略和机制, 决定何时应该进行 Compaction. 根据大多数用户的使用反馈, Compaction 对服务没有任何影响.

* __问: 我原来的配置文件中没有打开压缩选项(compression: no), 我能中途把 compression 改为 yes 吗?__

 > __答:__ 是的, 你可以在任何时候修改 compression 选项, 只要你重启 ssdb-server, 新的修改就能生效. 更改后, 原来的数据依然兼容, 不会有任何问题.

* __问: 我开启了压缩选项, 但 SSDB 的硬盘占用并没有变小, 这是怎么回事?__

 > __答:__ 无论你开启或者关闭压缩选项, 只要重启后, 新的选项就已经生效了. 但是, 新的选项不一定立即影响原来的旧数据, SSDB 会在合适的时候将新选项应用于旧数据, 你无法控制这一点.

-----

* __问: __ 有命令可以知道 SSDB 中存储的 key 总数吗?

 > __答:__ 如果你想统计的是 KV 的数量, 那么, 在一开始时, 你就要把所有 KV 都放在同一个 HASH 中, 然后通过 [hsize](./commands/hsize.html) 命令就可以得到 key 的数量了. 如果一开始你没有这么做, 或者你想统计 KV 以外的数量, 那么答案很简单 - 没有.

* __问: __ SSDB 支持 key 查找吗? 支持通配符 * 模糊查找吗?

 > __答:__ SSDB 支持, 且__仅__支持前缀查找, 也就是类似`a*`这样的查找, 而不支持 `*a`, `*a*` 或者其它的模糊查找. 具体用法请参见命令: [scan](./commands/scan.html), [hlist](./commands/hlist.html), [keys](./commands/keys.html), [hkeys](./commands/hkeys.html), [hscan](./commands/hscan.html), [zlist](./commands/zlist.html), [zkeys](./commands/zkeys.html), [zscan](./commands/zscan.html), [qlist](./commands/qlist.html) 的文档.
 
 > __注意, 这些命令都要求你省略 `*` 号!__

* __问: __ SSDB 不支持 sets 集合吗? Redis 的 sadd, sdiff 等求交集, 并集命令我都用不了了?

 > __答:__ SSDB 不支持 sets, 以后也不太可能支持, 因为有替代方案. 你可以用 hash 来替代 sets, 因为一个 hash 的 key 是唯一的, 可以实现集合的特性. 至于交集, 并集等操作, 你只能自己实现. 例如, 求交集, 你可以遍历第一个 hash 的 key, 然后和第二个 hash 对比, 把结果存入第三个 hash.

-----

* __问: __ 我用 Twemproxy 配置 SSDB 做负载均衡和集群, 但是当我用 ssdb-cli 连接 Twemproxy 时, 会报错, 为什么?

 > __答:__ 因为 Twemproxy 不支持 SSDB 网络协议, 所以, 你只能使用 redis-cli 连接 Twemproxy. 注意, 你可以用 ssdb-cli 或者 redis-cli 连接 SSDB, 那是因为 SSDB 支持两种协议, 而 Twemproxy 只支持一种.

* __问: __

 > __答:__ 
