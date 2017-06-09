# Download and Install

Deploying SSDB using the __Linux operating system__.

<div class="alert alert-warning">
Do not run SSDB server on Windows system for a production environment. If you wish to stick with Windows system, please run a Linux virtual machine on Windows, and run SSDB server on that Linux.
</div>

## Compile and Install

	wget --no-check-certificate https://github.com/ideawu/ssdb/archive/master.zip
	unzip master
	cd ssdb-master
	make
	# optional, install ssdb in /usr/local/ssdb
	sudo make install

If you want to install ssdb in some other directory other than `/usr/local`, run like

	sudo make install PREFIX=/your/directory

### Trouble Shooting

If you see error messages like this:

	g++ ...deps/snappy-1.1.0/.libs/libsnappy.a: No such file or directory
	make[1]: *** [all] Error 1

or

	g++ ...deps/jemalloc-3.3.1/lib/libjemalloc.a: No such file or directory
	make[1]: *** [all] Error 1
 
It is because Snappy or Jemalloc is not compiled successfully, maybe your system clock is wrong. Solve it by doing this:

    cd deps/snappy-1.1.0;
	autoreconf --force --install
	./configure
	make

or

    cd deps/jemalloc-3.3.1;
	autoreconf --force --install
	./configure
	make

## Start and Stop ssdb-server

	# start master
	./ssdb-server ssdb.conf
	
	# or start as daemon
	./ssdb-server -d ssdb.conf
	
	# stop ssdb-server
	./ssdb-server ssdb.conf -s stop
	# for older version
	kill `cat ./var/ssdb.pid`
	
	# restart
	./ssdb-server ssdb.conf -s restart


By now, you will have to manage the ```ssdb-server``` process(es) manually, if you want to set it to start and stop along with the system, follow the instructions below.

## SSDB Init Scripts(Auto Startup Along with OS)

Assumming you have installed SSDB under the ```/usr/local/ssdb``` folder, put the ```tools/ssdb.sh``` script into ```/etc/init.d``` directory.

<div class="alert alert-warning">
Notice: For CentOS users, rename <code>ssdb.sh</code> to <code>ssdb</code>.
</div>

Edit the following lines of ```ssdb.sh```:

	# each config file for one instance
	configs=/data/ssdb_data/test/ssdb.conf

Change ```/data/ssdb_data/test/ssdb.conf``` to the location of your SSDB config file. If you have more than one SSDB instances, put all config files in one line, separated by spaces:

	# each config file for one instance
	configs=/data/ssdb_data/test/ssdb.conf /data/ssdb_data/demo/ssdb.conf

__CentOS__

<pre>
sudo chkconfig --add ssdb
sudo chkconfig ssdb on
</pre>

__Ubuntu__

<pre>
sudo chmod a+x /etc/init.d/ssdb
sudo update-rc.d ssdb defaults
</pre>
