# hscan key_start key_end limit

List key-value pairs of a hashmap with keys in range `(key_start, key_end]`.

`("", ""]` means no range limit.

## Parameters

* `name` - The name of the hashmap
* `key_start` - The lower bound(not included) of keys to be returned, empty string means -inf(no limit).
* `key_end` - The upper bound(inclusive) of keys to be returned, empty string means +inf(no limit).
* `limit` - Up to that many pairs will be returned.

## Return Value

Key-Value list.

The key-value list is return as: k1 v1 k2 v2 ...

## Example

	ssdb 127.0.0.1:8888> hgetall h
	key             value
	-------------------------
	  a               : a
	  b               : b
	  c               : c
	  d               : d
	  e               : e
	  f               : f
	6 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> hscan h a c 10
	key             value
	-------------------------
	  b               : b
	  c               : c
	2 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> 
