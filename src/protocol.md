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
