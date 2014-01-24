# Import existing LevelDB data into SSDB

SSDB provides the ```leveldb-import``` tool to import existing LevelDB data into ssdb server. This tool is very easy to use.

<div class="alert alert-info">You can not simply copy the LevelDB binary files, this way will not work.</div>

### Usage

	./tools/leveldb-import ip port input_folder

### Options

* ip - ssdb server ip address
* port - ssdb server port number
* input_folder - local leveldb folder

### Example

	./tools/leveldb-import 127.0.0.1 8888 ./leveldb/
