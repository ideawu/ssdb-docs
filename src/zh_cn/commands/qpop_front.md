# qpop_front name size

Pop out one or more elements from the head of a queue.

## Parameters

* `name` - 
* `size` - Optional, number of elements to pop, default is 1

## Return Value

false on error. When size is not specified or less than 2, returns null if queue empty, otherwise the item removed. When size is specified and greater than or equal to 2, returns an array of elements removed.

## Example
