# 下载和安装

强烈推荐你把 SSDB 部署在 __Linux 操作系统__上.

<div class="alert alert-warning">
不要在生产环境中使用 Windows 操作系统来运行 SSDB 服务器. 如果你确实必须使用 Windows 操作系统, 请在上面运行一个 Linux 虚拟机, 然后再让 SSDB 运行于这个虚拟机之中.
</div>

	$ wget --no-check-certificate https://github.com/ideawu/ssdb/archive/master.zip
	$ unzip master
	$ cd ssdb-master
	$ make
	$ # 将安装在 /usr/local/ssdb 目录下
	$ sudo make install
	
	# 启动主库
	$ ./ssdb-server ssdb.conf
	
	# 启动为后台进程
	$ ./ssdb-server -d ssdb.conf
	
	# 启动 ssdb 命令行
	$ ./tools/ssdb-cli -p 8888
	
	# 停止 ssdb-server
	$ kill `cat ./var/ssdb.pid`

到目前为止, 你需要手动管理 ```ssdb-server``` 进程, 如果你希望在操作系统启动和停止时自动地管理, 请按下面的说明进行.

## SSDB 启动脚本(随操作系统自启动)

假设你已经安装 SSDB 在默认的 ```/usr/local/ssdb``` 目录, 把 ```tools/ssdb.sh``` 脚本放到 ```/etc/init.d``` 目录下.

编辑下面的内容:

	# each config file for one instance
	configs=/data/ssdb_data/test/ssdb.conf

将 ```/data/ssdb_data/test/ssdb.conf``` 修改为你的 SSDB 配置文件的路径. 如果你有多个 SSDB 实例, 那么把它们写在一行, 用空格来分隔:

	# each config file for one instance
	configs=/data/ssdb_data/test/ssdb.conf /data/ssdb_data/demo/ssdb.conf
