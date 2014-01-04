# Migrate from Redis to SSDB

## Tools

The PHP script ```redis-import.php``` in ```tools/``` directory is the script to copy data from a Redis instance to a SSDB instance.

__Usage:__

```
php redis-import.php redis_host redis_port redis_db ssdb_host ssdb_port
```

Parameters:

* redis_host: The IP address or hostname of Redis instance
* redis_host: The port number of Redis instance
* redis_db: Which Redis database(a number) you want to copy from
* ssdb_host: The IP address or hostname of SSDB instance
* ssdb_host: The port number of SSDB instance

## SSDB vs Redis Commands

SSDB supports Redis network protocol, you can use Redis clients to connect to a SSDB server and operate on it.

But if you want to move from Redis to SSDB, you will need this Redis-To-SSDB commands transfrom table.

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
