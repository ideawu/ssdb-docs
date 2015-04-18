# setbit key offset val

Changes a single bit of a string. The string is auto expanded.

## Parameters

* `key` - 
* `offset` - bit offset.
* `val` - 0 or 1.

## Return Value

The value of the bit before it was set: 0 or 1. If val is not 0 or 1, returns false.

## Example

