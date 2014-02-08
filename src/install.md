# Download and Install

I suggest deploying SSDB using the __Linux operating system__.

	$ wget --no-check-certificate https://github.com/ideawu/ssdb/archive/master.zip
	$ unzip master
	$ cd ssdb-master
	$ make
	$ # optional, install ssdb in /usr/local/ssdb
	$ sudo make install
	
	# start master
	$ ./ssdb-server ssdb.conf
	
	# or start as daemon
	$ ./ssdb-server -d ssdb.conf
	
	# ssdb command line
	$ ./tools/ssdb-cli -p 8888
	
	# stop ssdb-server
	$ kill `cat ./var/ssdb.pid`

By now, you will have to manage the ```ssdb-server``` process(es) manually, if you want to set it to start and stop along with the system, follow the instructions below.

## SSDB Init Scripts(Auto startup along with OS)

Assumming you have installed SSDB under the ```/usr/local/ssdb``` folder, put the ```tools/ssdb.sh``` script into ```/etc/init.d``` directory.

Edit the following lines of ```ssdb.sh```:

	# each config file for one instance
	configs=/data/ssdb_data/test/ssdb.conf

Change ```/data/ssdb_data/test/ssdb.conf``` to the location of your SSDB config file. If you have more than one SSDB instances, put all config files in one line, separated by spaces:

	# each config file for one instance
	configs=/data/ssdb_data/test/ssdb.conf /data/ssdb_data/demo/ssdb.conf
