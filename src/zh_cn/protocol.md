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

## 高性能的 SSDB 协议解析器

	#include <stdlib.h>
	#include <string.h>
	
	int len = buffer->size();
	char *ptr = buffer->data();
	while(len > 0){
		char *data = (char *)memchr(ptr, '\n', len);
		if(data == NULL){
			break;
		}
		data += 1;
		int num = data - ptr;
		if(num == 1 || (num == 2 && ptr[0] == '\r')){
			// Packet received.
			return OK;
		}
		// Size received
		int size = (int)strtol(ptr, NULL, 10);
		
		len -= num + size;
		ptr += num + size;
		if(len >= 1 && ptr[0] = '\n'){
			len -= 1;
			ptr += 1;
		}else if(len >= 2 && ptr[0] == '\r' && ptr[1] == '\n'){
			len -= 2;
			ptr += 2;
		}else{
			break;
		}
		// Data received
	}

给 SDK 开发者的建议: `Data` 可以包含任意字符, 包括 `\r, \n, \0...`, 所以你__不要__认为 `Data` 里面不会出现这些字符.
