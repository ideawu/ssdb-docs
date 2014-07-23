# 文档

SSDB 是一个 C/C++ 语言开发的高性能 NoSQL 数据库, 支持 KV, list, map(hash), zset(sorted set) 等数据结构, 用来替代或者与 Redis 配合存储十亿级别列表的数据.

SSDB 是稳定的, 生产环境使用的, 已经在许多互联网公司得到广泛使用, 如奇虎 360, TOPGAME.

## 开始

* [下载和安装](./install.html)
* [配置](./config.html)
* [命令列表](./commands.html)
* [客户端](./clients.html): 不同语言的 SSDB 客户端.
* [从 __Redis__ 迁移到 SSDB](./redis-to-ssdb.html)
* [导入 LevelDB](./leveldb-import.html): 将现有的 LevelDB 数据导入 SSDB.
* [用户案例](./users.html): SSDB 使用案例介绍.

## 运维管理

* [ssdb-cli](./ssdb-cli.html): SSDB 命令行工具.
* [PHP SSDB Admin](https://github.com/ssdb/phpssdbadmin): SSDB 的图形化界面管理工具.
* [备份](./backup.html)
* [日志解读](./logs.html)

## 定义

* [SSDB 网络协议定义](./protocol.html): 给那些想开发 SSDB 客户端的开发者.

## API 文档

* [PHP 客户端 API 文档](./php/index.html)
* [C++ 客户端 API 文档(英文)](../cpp/index.html)
* [Java 客户端 API 文档(英文)](../java/index.html)
* [Go 客户端 API 文档(英文)](../go/index.html)

## 文章

* <a href="http://www.ideawu.net/blog/category/ssdb" target="_blank">SSDB 文章</a>

## 幻灯片

* <a href="http://ssdb.io/ssdb-get-started.pdf" target="_blank">SSDB 入门基础(Chinese)</a>

## Authors

@ideawu
