# 从 Redis 迁移到 SSDB

## 工具

在 ```tools``` 目录中的 ```redis-import.php``` PHP 脚本可以用来将 Redis 服务器上的数据, 拷贝到 SSDB 服务器上.

__用法:__

```
php redis-import.php redis_host redis_port redis_db ssdb_host ssdb_port
```

__参数:__

* redis_host: Redis 运行所在的 IP 或者主机名
* redis_port: Redis 监听的端口
* redis_db: Redis 的 DB 编号
* ssdb_host: SSDB 运行所在的 IP 或者主机名
* ssdb_port: SSDB 监听的端口

请确保你的 PHP Redis 模块 [https://github.com/nicolasff/phpredis](https://github.com/nicolasff/phpredis) 已经安装.


<a name="redis-tools"></a>

## Redis 工具的支持

<table class="table">
<thead>
	<tr>
		<th width="200">Tool</th>
		<th>Supported</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>redis-cli</td>
		<td><span class="label label-success">支持</span></td>
	</tr>
	<tr>
		<td>Twemproxy</td>
		<td><span class="label label-success">支持</span></td>
	</tr>
	<tr>
		<td>Sentinel</td>
		<td><span class="label label-default">不支持</span></td>
	</tr>
</tbody>
</table>


## SSDB 和 Redis 命令对照表

SSDB 支持 Redis 协议和客户端, 所以你可以使用 Redis 的客户端来连接 SSDB 进行操作.

但是, 如果你想使用 SSDB 的客户端, 你可能需要下面的命令对照表.


### Key-Value

<table class="table table-striped">
<thead>
	<tr>
		<th width="200">Redis</th>
		<th>SSDB</th>
	</tr>
</thead>
<tbody>
	<tr><td>get</td><td>get</td></tr>
	<tr><td>set</td><td>set</td></tr>
	<tr><td>setex</td><td>setx(for kv type only)</td></tr>
	<tr><td>del</td><td>del</td></tr>
	<tr><td>incr/incrBy</td><td>incr</td></tr>
	<tr><td>decr/decrBy</td><td>decr</td></tr>
	<tr><td>mget/getMultiple</td><td>multi_get</td></tr>
	<tr><td>setMultiple</td><td>multi_set</td></tr>
	<tr><td>del(multiple)</td><td>multi_del</td></tr>
	<tr><td>keys</td><td>keys(for kv type only)</td></tr>
	<tr><td>getset</td><td>getset</td></tr>
	<tr><td>setnx</td><td>setnx</td></tr>
	<tr><td>exists</td><td>exists</td></tr>
	<tr><td>ttl</td><td>ttl</td></tr>
	<tr><td>expire</td><td>expire</td></tr>
	<tr><td>getbit</td><td>getbit</td></tr>
	<tr><td>setbit</td><td>setbit</td></tr>
	<tr><td>bitcount</td><td>redis_bitcount, countbit</td></tr>
	<tr><td>strlen</td><td>strlen</td></tr>
	<tr><td>getrange</td><td>getrange</td></tr>
</tbody>
</table>

__请非常细心地阅读此处的说明:__

* 对于 Redis, `substr` 命令早已经被废弃, 所以你不要使用 `substr` 命令在 Redis 客户端(当然, 你__可以__这么做, 但你__必须不__这么做)
* 如果你还想着 Redis, 那么就用 `getrange` 命令
* 注意这两者的区别: `substr(start, size)`, `getrange(start, end)`
* 当 size 是负数时, 如果你不熟悉 PHP 语言, 那么你会觉得有些奇怪
* SSDB 的 `substr` 命令的描述这 [这里](https://ssdb.io/docs/zh_cn/php/content.html#m-substr)


### Key-Map(Hash)

<table class="table table-striped">
<thead>
	<tr>
		<th width="200">Redis</th>
		<th>SSDB</th>
	</tr>
</thead>
<tbody>
	<tr><td>del(<b>not supported</b>)</td><td>hclear</td></tr>
	<tr><td>hget</td><td>hget</td></tr>
	<tr><td>hset</td><td>hset</td></tr>
	<tr><td>hdel, hmdel</td><td>hdel, multi_hdel</td></tr>
	<tr><td>hIncrBy</td><td>hincr</td></tr>
	<tr><td>hDecrBy</td><td>hdecr</td></tr>
	<tr><td>hKeys</td><td>hkeys</td></tr>
	<tr><td>hVals</td><td>hscan</td></tr>
	<tr><td>hMGet</td><td>multi_hget</td></tr>
	<tr><td>hMSet</td><td>multi_hset</td></tr>
	<tr><td>hLen</td><td>hsize</td></tr>
	<tr><td>hExists</td><td>hexists</td></tr>
	<tr><td>keys</td><td>hlist(for hash type only)</td></tr>
</tbody>
</table>

__如果你想删除整个 hash, 那么你就必须使用 SSDB 的客户端来执行 `hclear` 命令, 用 Redis 的客户端是删除不了整个 hash 的.__


### Key-Zset

<table class="table table-striped">
<thead>
	<tr>
		<th width="200">Redis</th>
		<th>SSDB</th>
	</tr>
</thead>
<tbody>
	<tr><td>del(<b>not supported</b>)</td><td>zclear</td></tr>
	<tr><td>zScore</td><td>zget</td></tr>
	<tr><td>zAdd</td><td>zset</td></tr>
	<tr><td>zRem</td><td>zdel</td></tr>
	<tr><td>zRange</td><td>zrange</td></tr>
	<tr><td>zRevRange</td><td>zrrange</td></tr>
	<tr><td>zRangeByScore</td><td>zscan</td></tr>
	<tr><td>zRevRangeByScore</td><td>zrscan</td></tr>
	<tr><td>zIncrBy</td><td>zincr</td></tr>
	<tr><td>zDecrBy</td><td>zdecr</td></tr>
	<tr><td>zCount</td><td>zcount</td></tr>
	<tr><td>zSum</td><td>zsum</td></tr>
	<tr><td>zAvg</td><td>zavg</td></tr>
	<tr><td>zCard</td><td>zsize</td></tr>
	<tr><td>zRank</td><td>zrank</td></tr>
	<tr><td>zRemRangeByRank</td><td>zremrangebyrank</td></tr>
	<tr><td>zRemRangeByScore</td><td>zremrangebyscore</td></tr>
	<tr><td>keys</td><td>zlist(for zset type only)</td></tr>
</tbody>
</table>

__如果你想删除整个 zset, 那么你就必须使用 SSDB 的客户端来执行 `zclear` 命令, 用 Redis 的客户端是删除不了整个 zset 的.__


### Key-List(Queue)

<table class="table table-striped">
<thead>
	<tr>
		<th width="200">Redis</th>
		<th>SSDB</th>
	</tr>
</thead>
<tbody>
	<tr><td>del(<b>not supported</b>)</td><td>qclear</td></tr>
	<tr><td>llen/lsize</td><td>qsize</td></tr>
	<tr><td>lpush</td><td>qpush_front</td></tr>
	<tr><td>rpush</td><td>qpush_back</td></tr>
	<tr><td>lpop</td><td>qpop_front</td></tr>
	<tr><td>rpop</td><td>qpop_back</td></tr>
	<tr><td>lrange</td><td>qslice</td></tr>
	<tr><td>lindex, lget</td><td>qget</td></tr>
	<tr><td>lset</td><td>qset</td></tr>
	<tr><td>keys</td><td>qlist(for queue/list type only)</td></tr>
</tbody>
</table>

__如果你想删除整个 list, 那么你就必须使用 SSDB 的客户端来执行 `qclear` 命令, 用 Redis 的客户端是删除不了整个 list 的.__

