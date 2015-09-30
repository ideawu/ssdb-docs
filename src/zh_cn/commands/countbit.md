# countbit key [start] [size]

计算字符串的子串所包含的位值为 1 的个数. 若 start 是负数, 则从字符串末尾算起. 若 size 是负数, 则表示从字符串末尾算起, 忽略掉那么多字节.

跟 [bitcount](./bitcount.html) 表示区间的参数含义不一样.

## 参数

* `key` - 
* `start` - 可选, 子串的字节偏移
* `size` - 可选, 子串的长度(字节数), 默认为到字符串最后一个字节 

## 返回值

The number of bits set to 1.

## 示例

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
