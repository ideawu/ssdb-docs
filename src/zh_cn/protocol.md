# SSDB 网络协议定义

SSDB 的网络协议超级简单!

## 报文

```
Packet := Block+ '\n'
Block  := Size '\n' Data '\n'
Size   := literal_integer
Data   := size_bytes_of_data
```

## 请求

```
Request := Cmd Blocks*
Cmd     := Block
```

请求命令包括: ```get, set, del, ...```

## 响应

```
Response := Status Block*
Status   := Block
```

响应状态码包括: ```ok, not_found, error, fail, client_error```

## 示例

用 telnet 或者 nc 命令连接到 SSDB 服务器, 然后输入下面的代码(用最后一行空行结束):

```
3
get
3
key

```

你将看到类似这样的响应:

```
2
ok
3
val
```
