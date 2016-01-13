# qlist name_start name_end limit

列出名字处于区间 (name_start, name_end] 的 queue/list.

("", ""] 表示整个区间.

参见命令 [scan](./scan.html) 对参数的详细解释.

## 参数

    name_start - The lower bound(not included) of names to be returned, empty string means -inf(no limit).
    name_end - The upper bound(inclusive) of names to be returned, empty string means +inf(no limit).
    limit - Up to that many elements will be returned.

## 返回值

false on error, otherwise an array containing the names.

## 示例
