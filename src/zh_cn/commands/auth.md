# AUTH password

__Since: 1.7.0.0__

向服务器校验访问密码.

<div class="alert alert-warning">
注意, 密码是明文传输的!
</div>

## 返回值

成功返回 `ok`, 否则返回错误码和错误信息.
## 示例

	ssdb 127.0.0.1:8888> AUTH p@ssword
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
