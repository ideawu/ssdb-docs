# setbit key offset val

Changes a single bit of a string. The string is auto expanded.

## 参数

* `key` - 
* `offset` - bit offset.
* `val` - 0 or 1.

## 返回值

The value of the bit before it was set: 0 or 1. If val is not 0 or 1, returns false.

## 示例

