# hsize name

Return the number of key-value pairs in the hashmap.

## Parameters

* `name` - The name of the hashmap

## Return Value

Integer reply.

## Example

	ssdb 127.0.0.1:8888> hsize h
	7
	(0.000 sec)
	ssdb 127.0.0.1:8888> hclear h
	7
	(0.000 sec)
	ssdb 127.0.0.1:8888> hsize h
	0
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
