# qpop_back name size

Pop out one or more elements from the tail of a queue.

## 参数

* `name` - 
* `size` - Optional, number of elements to pop, default is 1

## 返回值

false on error. When size is not specified or less than 2, returns null if queue empty, otherwise the item removed. When size is specified and greater than or equal to 2, returns an array of elements removed.

## 示例
