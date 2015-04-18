# DBSIZE

Return the ___approximate___ size of the database, in bytes. If compression is enabled, the size will be of the compressed data.

## Return value

Size in bytes.

## Examples

	ssdb 127.0.0.1:8888> DBSIZE
	407981972
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
