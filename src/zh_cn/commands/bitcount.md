# bitcount key [start] [end]

Count the number of set bits (population counting) in a string. Like Redis's [bitcount](http://redis.io/commands/bitcount).

## Parameters

* `key` - 
* `start - Optional, inclusive, if start is negative, count from start'th character from the end of string.
* `end` - Optional, inclusive.

## Return Value

The number of bits set to 1.

## Example

	ssdb 127.0.0.1:8888> set a 123
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> countbit a 0 1
	3
	(0.000 sec)
	ssdb 127.0.0.1:8888> bitcount a 0 1
	6
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
