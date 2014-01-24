# 将现有的 LevelDB 数据导入 SSDB

SSDB 提供了 ```leveldb-import``` 工具来将 LevelDB 的数据导入到 SSDB 数据库中. 该工具的使用非常简单.

<div class="alert alert-info">你不能直接复制 LevelDB 的文件到 SSDB 目录, 这种方式是错误的.</div>
### 用法

	./tools/leveldb-import ip port input_folder

### 参数

* ip - SSDB 服务器的 IP
* port - SSDB 服务器的端口号
* input_folder - 本地 LevelDB 数据库的目录

### 示例

	./tools/leveldb-import 127.0.0.1 8888 ./leveldb/
