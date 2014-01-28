# Download and Install

	$ wget --no-check-certificate https://github.com/ideawu/ssdb/archive/master.zip
	$ unzip master
	$ cd ssdb-master
	$ make
	$ #optional, install ssdb in /usr/local/ssdb
	$ sudo make install
	
	# start master
	$ ./ssdb-server ssdb.conf
	
	# or start as daemon
	$ ./ssdb-server -d ssdb.conf
	
	# ssdb command line
	$ ./tools/ssdb-cli -p 8888
	
	# stop ssdb-server
	$ kill `cat ./var/ssdb.pid`
