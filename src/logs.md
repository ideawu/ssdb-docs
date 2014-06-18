# Logs Analytics

This is the guide to understand the logs a SSDB server generates.

Generally, I recommend you set `logger.level` to `debug`.

## Request Handling

	2014-06-18 11:01:40.335 [DEBUG] serv.cpp(395): w:0.393,p:5.356, req: set a 1, resp: ok 1

* `w:0.393` request wait time, in ms
* `p:0.393` request process time, in ms
* `req:...` the request
* `resp:...` the response

### Find out Slow Queries

The Shell commands to find out slow queries:

	tail -f log.txt | grep resp | grep '[wp]:[1-9][0-9]\{0,\}\.'
	# or
	cat log.txt | grep resp | grep '[wp]:[1-9][0-9]\{0,\}\.'

These commands find out requests with wait time or process time greater than 1ms.

__Find out requests slower than 10ms:__

	cat a.txt | grep resp | grep '[wp]:[1-9][0-9]\{1,\}\.'

__Find out requests slower than 100ms:__

	cat a.txt | grep resp | grep '[wp]:[1-9][0-9]\{2,\}\.'

## SSDB is working

ssdb-server print out log like these every 5 minutes:

	2014-06-18 11:18:03.600 [INFO ] ssdb-server.cpp(215): ssdb working, links: 0
	2014-06-18 11:23:03.631 [INFO ] ssdb-server.cpp(215): ssdb working, links: 0

* `links: 0` current connections
