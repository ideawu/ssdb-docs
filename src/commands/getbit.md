# getbit key offset

Return a single bit out of a string.

## Parameters

* `key` - 
* `offset` - bit offset.

## Return Value

`0` or `1`.

## Example

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> getbit a 3
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> getbit a 4
	1
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
