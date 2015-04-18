# qlist name_start name_end limit

List list/queue names in range `(name_start, name_end]`.

`("", ""]` means no range limit.

## Parameters

    name_start - The lower bound(not included) of names to be returned, empty string means -inf(no limit).
    name_end - The upper bound(inclusive) of names to be returned, empty string means +inf(no limit).
    limit - Up to that many elements will be returned.

## Return Value

false on error, otherwise an array containing the names.

## Example
