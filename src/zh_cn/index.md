# 文档

![SSDB logo](https://ssdb.io/img/ssdb.io-h50.png)

SSDB 是一个 C/C++ 语言开发的高性能 NoSQL 数据库, 支持 KV, list, map(hash), zset(sorted set) 等数据结构, 用来替代或者与 Redis 配合存储十亿级别列表的数据.

SSDB 是稳定的, 生产环境使用的, 已经在[许多互联网公司得到广泛使用](./users.html), 如奇虎 360, TOPGAME.

## 开始

* [FAQ](./faq.html): FAQ - 常见问题
* [下载和安装](./install.html)
* [配置](./config.html)
* [命令列表](./commands/index.html)
* [客户端](./clients.html): 不同语言的 SSDB 客户端.
* [从 __Redis__ 迁移到 SSDB](./redis-to-ssdb.html)
* [导入 LevelDB](./leveldb-import.html): 将现有的 LevelDB 数据导入 SSDB.
* [用户案例](./users.html): SSDB 使用案例介绍.

## 运维管理

* [ssdb-cli](./ssdb-cli.html): SSDB 命令行工具(同时有图形界面工具的链接).
* [PHP SSDB Admin](https://github.com/ssdb/phpssdbadmin): SSDB 的图形化界面管理工具.
* [备份](./backup.html): 导出/导入数据库.
* [日志解读](./logs.html)
* [同步和复制](./replication.html): 同步和复制的配置与监控.
* [集群和分布式](./cluster.html): SSDB 集群和分布式.
* [高可用性/HA](./ha.html): SSDB 高可用性/HA方案

## 定义

* [SSDB 网络协议定义](./protocol.html): 给那些想开发 SSDB 客户端的开发者.
* [限制](./limit.html): 如最大 key 长度限制, 等等.

## API 文档

* [PHP 客户端 API 文档](./php/index.html)
* [C++ 客户端 API 文档(英文)](../cpp/index.html)
* [Java 客户端 API 文档(英文)](../java/index.html)
* [Go 客户端 API 文档(英文)](../go/index.html)

## 文章

* <a href="http://www.ideawu.net/blog/category/ssdb" target="_blank">SSDB 文章</a>

## 幻灯片

* <a href="https://ssdb.io/ssdb-get-started.pdf" target="_blank">SSDB 入门基础(Chinese)</a>

## 作者

[@ideawu](http://www.ideawu.net/)
