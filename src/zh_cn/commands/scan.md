# scan key_start key_end limit

List key-value pairs with keys in range `(key_start, key_end]`.

`("", ""]` means no range limit.

## 参数

* `key_start` - The lower bound(not included) of keys to be returned, empty string means -inf(no limit).
* `key_end` - The upper bound(inclusive) of keys to be returned, empty string means +inf(no limit).
* `limit` - Up to that many pairs will be returned.

## 返回值

false on error, otherwise an associative array containing the key-value pairs.

## 示例

