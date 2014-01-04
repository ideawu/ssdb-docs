# 从 Redis 迁移到 SSDB

## 工具

在 ```tools``` 目录中的 ```redis-import.php``` PHP 脚本可以用来将 Redis 服务器上的数据, 拷贝到 SSDB 服务器上.

__用法:__

```
php redis-import.php redis_host redis_port redis_db ssdb_host ssdb_port
```

参数:

* redis_host: Redis 运行所在的 IP 或者主机名
* redis_host: Redis 监听的端口
* redis_db: Redis 的 DB 编号
* ssdb_host: SSDB 运行所在的 IP 或者主机名
* ssdb_host: SSDB 监听的端口

## SSDB 和 Redis 命令对照表

SSDB 支持 Redis 协议和客户端, 所以你可以使用 Redis 的客户端来连接 SSDB 进行操作.

但是, 如果你想从 Redis 迁移到 SSDB, 你可能需要下面的命令对照表.

<table>
<tr>
	<th width="80"></th>
	<th width="200">Redis</th>
	<th width="200">SSDB</th>
</tr>

<tr>
	<td rowspan="9" style="background: #cf9;">kv</td>
	<td>get</td><td>get</td>
</tr>
<tr><td>set</td><td>set</td></tr>
<tr><td>del</td><td>del</td></tr>
<tr><td>incr/incrBy</td><td>incr</td></tr>
<tr><td>decr/decrBy</td><td>decr</td></tr>
<tr><td>getMultiple</td><td>multi_get</td></tr>
<tr><td>setMultiple</td><td>multi_set</td></tr>
<tr><td>del(multiple)</td><td>multi_del</td></tr>
<tr><td>keys</td><td>scan(for kv type only)</td></tr>
</table>

<table>
<tr>
	<th width="80"></th>
	<th width="200">Redis</th>
	<th width="200">SSDB</th>
</tr>
<tr>
	<td rowspan="10" style="background: #9cf;">hashmap</td>
	<td>hget</td><td>hget</td>
</tr>
<tr><td>hset</td><td>hset</td></tr>
<tr><td>hdel</td><td>hdel</td></tr>
<tr><td>hIncrBy</td><td>hincr</td></tr>
<tr><td>hDecrBy</td><td>hdecr</td></tr>
<tr><td>hKeys</td><td>hkeys</td></tr>
<tr><td>hVals</td><td>hscan</td></tr>
<tr><td>hMGet</td><td>multi_hget</td></tr>
<tr><td>hMSet</td><td>multi_hset</td></tr>
<tr><td>hLen</td><td>hsize</td></tr>

</table>



<table>
<tr>
	<th width="80"></th>
	<th width="200">Redis</th>
	<th width="200">SSDB</th>
</tr>
<tr>
	<td rowspan="9" style="background: #9c3;">zset</td>
	<td>zScore</td><td>zget</td>
</tr>
<tr><td>zAdd</td><td>zset</td></tr>
<tr><td>zRem</td><td>zdel</td></tr>
<tr><td>zRange</td><td>zrange/zscan</td></tr>
<tr><td>zRangeByScore</td><td>zscan</td></tr>
<tr><td>zIncrBy</td><td>zincr</td></tr>
<tr><td>zDecrBy</td><td>zdecr</td></tr>
<tr><td>zCount</td><td></td></tr>
<tr><td>zCard</td><td>zsize</td></tr>
</table>
