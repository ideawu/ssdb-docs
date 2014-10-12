# Backup SSDB(export/import)

## Backup with ssdb-cli

Use ssdb-cli to connect to a ssdb server.

	# backup current database into file backup.ssdb
	ssdb 127.0.0.1:8888> export backup.ssdb
	
	# import backup.ssdb into current database
	ssdb 127.0.0.1:8888> import backup.ssdb

Notice: the import command will replace existing key(s).

## Backup with ssdb-dump

The ```ssdb-dump``` tool is for data backup of a SSDB instance.

### Export

__Usage:__

    ./tools/ssdb-dump ip port output_folder

__Options:__

* ip - ssdb server ip address
* port - ssdb server port number
* output_folder - local backup folder that will be created

__Example:__

	./tools/ssdb-dump 127.0.0.1 8888 ./output_folder

The ```output_folder``` must not exist, it will be created by ssdb-dump. And there are two folders in it, a ```data``` folder contains data, and an empty folder ```meta```.

### Recover

Copy the folder ```output_folder``` to your server, you may want to rename it. Update your ssdb.conf, point ```work_dir``` to your ```output_folder```, then restart ssdb-server.
