# 备份 SSDB 数据(导出/导入)

##  使用 ssdb-cli

使用 ssdb-cli 连接到 SSDB 服务器.

	# backup current database into file backup.ssdb
	ssdb 127.0.0.1:8888> export backup.ssdb
	
	# import backup.ssdb into current database
	ssdb 127.0.0.1:8888> import backup.ssdb

<span class="label label-warning" style="font-size: 120%;">注意</span> import 命令会把数据库中的相同 key 给替换.

## 备份 SSDB 数据

用来备份 SSDB 数据的工具是 ```ssdb-dump```.

### 导出

__用法:__

    ./tools/ssdb-dump ip port output_folder

__选项:__

* ip - ssdb 服务器监听的 IP 地址
* port - ssdb 服务器监听的端口号
* output_folder - 将要创建备份数据的本地目录

__示例:__

	./tools/ssdb-dump 127.0.0.1 8888 ./output_folder

目录 ```output_folder``` 必须不存在, 因为 ssdb-dump 会创建这个目录. 导出之后, 这个目录里将有两个子目录, ```data``` 目录里包含着数据, 还有一个空的 ```meta``` 目录.

### 恢复

将 ```output_folder``` 目录拷贝到你的服务器上面, 你可能需要将它改名. 然后修改你的 ssdb.conf 配置文件, 将 ```work_dir``` 指向 ```output_folder``` 目录, 然后重启 ssdb-server.
