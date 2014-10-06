# SSDB Network Protocol Specification

SSDB's network protocol is extremly ass kicking SIMPLE!

## Packet

```
Packet := Block+ '\n'
Block  := Size '\n' Data '\n'
Size   := literal_integer
Data   := size_bytes_of_data
```

## Request

```
Request := Cmd Blocks*
Cmd     := Block
```

Commands are: ```get, set, del, ...```

## Response

```
Response := Status Block*
Status   := Block
```

Status codes are: ```ok, not_found, error, fail, client_error```

## Example

Connect to a SSDB server with telnet or nc, then type in these codes(with an empty line at the end):

```
3
get
3
key

```

You will get response like this:

```
2
ok
3
val

```

## High performance parser for SSDB protocol

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

Advice to SDK developers: `Data` may contains any character, including `\r, \n, \0...`, so you MUST NOT expecting there is not such thing in `Data`.
