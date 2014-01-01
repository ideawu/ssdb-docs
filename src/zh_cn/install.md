# 下载和安装

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
	
	# 启动从库
	$ ./ssdb-server ssdb_slave.conf
	
	# 启动 ssdb 命令行
	$ ./tools/ssdb-cli -p 8888
	
	# 停止 ssdb-server
	$ kill `cat ./var/ssdb.pid`
