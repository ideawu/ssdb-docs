# zscan name key_start score_start score_end limit

列出 zset 中处于区间 `(key_start+score_start, score_end]` 的 key-score 列表. 如果 key_start 为空, 那么对应权重值大于或者等于 score_start 的 key 将被返回. 如果 key_start 不为空, 那么对应权重值大于 score_start 的 key, 或者大于 key_start 且对应权重值等于 score_start 的 key 将被返回.

也就是说, 返回的 key 在 `(key.score == score_start && key > key_start || key.score > score_start)`, 并且` key.score <= score_end` 区间. __先判断 score_start, score_end, 然后判断 key_start.___

`("", ""]` 表示整个区间.

## 参数

## 返回值

## 示例

All SSDB commands are described by [PHP API Doc](http://ssdb.io/docs/php/).
