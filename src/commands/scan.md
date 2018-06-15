# scan key_start key_end limit

List key-value pairs with keys in range `(key_start, key_end]`.

`("", ""]` means no range limit.

This command can do wildchar `*` like search, but only prefix search, and the `*` char must never occur in `key_start` and `key_end`!

## Parameters

* `key_start` - The lower bound(not included) of keys to be returned, empty string means -inf(no limit).
* `key_end` - The upper bound(inclusive) of keys to be returned, empty string means +inf(no limit).
* `limit` - Up to that many pairs will be returned.

## Return Value

false on error, otherwise an associative array containing the key-value pairs.

## Example

	ssdb 127.0.0.1:8888> scan "" "" 10
	key             value
	-------------------------
	  a               : 1
	  aa              : 1
	  b               : 2
	  c               : 3
	2 result(s) (0.000 sec)
	ssdb 127.0.0.1:8888> scan "a" "" 10
	key             value
	-------------------------
	  aa              : 1
	  b               : 2
	  c               : 3
	2 result(s) (0.000 sec)
	# 'a' is not returned. while key_end is not set, 'b', 'c' are returned!
	ssdb 127.0.0.1:8888> scan a a} 10
	key             value
	-------------------------
	  aa             : 1
	1 result(s) (0.000 sec)
	(0.000 sec)
	# "real" prefix search
	ssdb 127.0.0.1:8888> scan "a" "b" 10
	key             value
	-------------------------
	  aa              : 1
	  b               : 2
	2 result(s) (0.000 sec)
	# set key_end as 'b'(inclusive), so 'b' is returned! 'c' is not.

