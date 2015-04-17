# AUTH password

__Available since: 1.7.0.0.__

Config the password for later use to authenticate the connection. The authentication is not invoked immediately, but later when you send the first request to the server. 

<div class="alert alert-warning">
Warning: The password is sent in plain-text over the network!
</div>

## Return value

```ok``` if success, error message if error occurrs.

## Examples

	ssdb 127.0.0.1:8888> AUTH p@ssword
	ok
	(0.000 sec)
	ssdb 127.0.0.1:8888> 
