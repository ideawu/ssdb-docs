# Migrate from Redis to SSDB

## Tools

The PHP script ```redis-import.php``` in ```tools/``` directory is the script to copy data from a Redis instance to a SSDB instance.

__Usage:__

```
php redis-import.php redis_host redis_port redis_db ssdb_host ssdb_port
```

__Options:__

* redis_host: The IP address or hostname of Redis instance
* redis_port: The port number of Redis instance
* redis_db: Which Redis database(a number) you want to copy from
* ssdb_host: The IP address or hostname of SSDB instance
* ssdb_port: The port number of SSDB instance

Make sure you have the PHP Redis module [https://github.com/nicolasff/phpredis](https://github.com/nicolasff/phpredis) installed.


<a name="redis-tools"></a>

## Supported Redis Tools

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
		<td><span class="label label-success">Yes</span></td>
	</tr>
	<tr>
		<td>Twemproxy</td>
		<td><span class="label label-success">Yes</span></td>
	</tr>
	<tr>
		<td>Sentinel</td>
		<td><span class="label label-default">No</span></td>
	</tr>
</tbody>
</table>


## SSDB vs Redis Commands

SSDB supports Redis network protocol, you can use Redis clients to connect to a SSDB server and operate on it.

But if you want to use SSDB clients, you will need this Redis-To-SSDB commands transfrom table.

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
	<tr><td>getMultiple</td><td>multi_get</td></tr>
	<tr><td>setMultiple</td><td>multi_set</td></tr>
	<tr><td>del(multiple)</td><td>multi_del</td></tr>
	<tr><td>keys</td><td>keys(for kv type only)</td></tr>
	<tr><td>getset</td><td>getset</td></tr>
	<tr><td>setnx</td><td>setnx</td></tr>
	<tr><td>ttl</td><td>ttl</td></tr>
	<tr><td>getbit</td><td>getbit</td></tr>
	<tr><td>setbit</td><td>setbit</td></tr>
	<tr><td>bitcount</td><td>redis_bitcount, countbit</td></tr>
	<tr><td>strlen</td><td>strlen</td></tr>
	<tr><td>getrange</td><td>getrange</td></tr>
</tbody>
</table>

__Please read these notes very carefully:__

* `substr` command is deprecated in Redis, so you should never use `substr` with a Redis client(however, you CAN do this, but MUST not do this)
* use `getrange` instead if you are sticking your mind with Redis
* notice the difference between `substr(start, size)` and `getrange(start, end)`
* when `size` is negative, the behavior may be strange for those who are not familiar with PHP language
* `substr` in SSDB works as described [here](http://ssdb.io/docs/php/content.html#m-substr)


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
	<tr><td>hdel</td><td>hdel</td></tr>
	<tr><td>hIncrBy</td><td>hincr</td></tr>
	<tr><td>hDecrBy</td><td>hdecr</td></tr>
	<tr><td>hKeys</td><td>hkeys</td></tr>
	<tr><td>hVals</td><td>hscan</td></tr>
	<tr><td>hMGet</td><td>multi_hget</td></tr>
	<tr><td>hMSet</td><td>multi_hset</td></tr>
	<tr><td>hLen</td><td>hsize</td></tr>
	<tr><td>keys</td><td>hlist(for hash type only)</td></tr>
</tbody>
</table>

__If you want to delete a hash entirely, you have to use a SSDB client to execute `hclear` command. You cannot delete a hash with any Redis client.__


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
	<tr><td>zRange</td><td>zrange/zscan</td></tr>
	<tr><td>zRangeByScore</td><td>zscan</td></tr>
	<tr><td>zIncrBy</td><td>zincr</td></tr>
	<tr><td>zDecrBy</td><td>zdecr</td></tr>
	<tr><td>zCount</td><td>zcount</td></tr>
	<tr><td>zCard</td><td>zsize</td></tr>
	<tr><td>zRemRangeByRank</td><td>zremrangebyrank</td></tr>
	<tr><td>zRemRangeByScore</td><td>zremrangebyscore</td></tr>
	<tr><td>keys</td><td>zlist(for zset type only)</td></tr>
</tbody>
</table>

__If you want to delete a zset entirely, you have to use a SSDB client to execute `zclear` command. You cannot delete a zset with any Redis client.__


### Key-List/Queue

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
	<tr><td>lrange</td><td>qrange/qslice</td></tr>
	<tr><td>lindex, lget</td><td>qget</td></tr>
	<tr><td>keys</td><td>qlist(for queue/list type only)</td></tr>
</tbody>
</table>

__If you want to delete a list entirely, you have to use a SSDB client to execute `qclear` command. You cannot delete a list with any Redis client.__

