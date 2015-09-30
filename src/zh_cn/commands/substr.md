# substr key start size

获取字符串的子串. 若 start 是负数, 则从字符串末尾算起. 若 size 是负数, 则表示从字符串末尾算起, 忽略掉那么多字节, 类似 PHP 的 [substr()](http://php.net/substr).

## 参数

* `key` - 
* `start` - Optional, the offset of first byte returned. If start is negative, the returned string will start at the start'th character from the end of string.
* `size` - Optional, number of bytes returned. If size is negative, then that many characters will be omitted from the end of string.

## 返回值

The extracted part of the string.

## 示例
