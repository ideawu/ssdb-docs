# zcount name score_start score_end

Returns the number of elements of the sorted set stored at the specified key which have scores in the range `[start,end]`.

## Parameters

* `name` - The name of the zset.
* `score_start` - The minimum score related to keys(inclusive), empty string means -inf(no limit).
* `score_end` - The maximum score related to keys(inclusive), empty string means +inf(no limit).

## Return Value

## Example

All SSDB commands are described by [PHP API Doc](https://ssdb.io/docs/php/).
