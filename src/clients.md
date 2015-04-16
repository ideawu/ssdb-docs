# Clients

<div class="alert alert-info">
	SSDB supports Redis network protocol, you can use Redis clients to connect to a SSDB server and operate on it. But using SSDB client is the most efficient way.
	<br/><br/>
	All SSDB client APIs are binary-compatible, binary is string, string is binary.
</div>

There are clients for various languages distributed along with the SSDB source code, these are __official clients__. Still, there are many clients developped by many developers, also listed here.

The recommended client(s) for a language are marked with a <span style="color: #cc3;">★</span>.

If you want your client be listed here, please fork the [ssdb-docs repository](https://github.com/ideawu/ssdb-docs) on GitHub and edit the ```clients.md``` file. __Submit a pull request__ and you are done. 

### <a href="#cpp" name="cpp">C++</a>

---

<table width="100%">
	<tr>
		<td width="21%">built-in <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
	<tr>
		<td width="21%">cppssdb</span></td>
		<td width="15%">ironsdu</td>
		<td width="20%">
			<a href="https://github.com/IronsDu/ssdb-cpp-api">Repository</a>
		</td>
		<td>
			C++ 11 async API client
		</td>
	</tr>
</table>

### <a href="#cpy" name="cpy">Cpy</a>

---

<table width="100%">
	<tr>
		<td width="21%">built-in <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb">Repository</a>
		</td>
		<td>
			This is the official client. see [Cpy](https://github.com/ideawu/cpy).
		</td>
	</tr>
</table>

<h3><a href="#cs" name="cs">C# .Net</a></h3>

---

<table width="100%">
	<tr>
		<td width="21%">official <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/dotnetssdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
</table>

### <a href="#go" name="go">Go</a>

---

<table width="100%">
	<tr>
		<td width="21%">official <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/gossdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
	<tr>
		<td width="21%">hissdb</td>
		<td width="15%">Eryx</td>
		<td width="20%">
			<a href="https://github.com/lessos/lessgo/tree/master/data/hissdb">Repository</a>
		</td>
		<td>
			hissdb in lessos/lessgo, supports connection pool.
		</td>
	</tr>
	<tr>
		<td width="21%">gossdb</td>
		<td width="15%">seefan</td>
		<td width="20%">
			<a href="https://github.com/seefan/gossdb">Repository</a>
		</td>
		<td>
			From the official client derived from the client, supports the connection pool and set|get, habits and most client consistent.
		</td>
	</tr>
</table>

### <a href="#java" name="java">Java</a>

---

<table width="100%">
	<tr>
		<td width="21%">official <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/javassdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
	<tr>
		<td width="21%">ssdb4j</td>
		<td width="15%">nutzam</td>
		<td width="20%">
			<a href="https://github.com/nutzam/ssdb4j">Repository</a>
		</td>
		<td>
			Yet another SSDB client for Java
		</td>
	</tr>
	<tr>
		<td width="21%">another ssdb4j</td>
		<td width="15%">jbakwd</td>
		<td width="20%">
			<a href="http://git.oschina.net/jbakwd/ssdbj">Repository</a>
		</td>
		<td>
			
		</td>
	</tr>
</table>

### <a href="#lua" name="lua">Lua</a>

---

<table width="100%">
	<tr>
		<td width="21%">lua-resty-ssdb</td>
		<td width="15%">LazyZhu</td>
		<td width="20%">
			<a href="https://github.com/LazyZhu/lua-resty-ssdb">Repository</a>
		</td>
		<td>
			Lua ssdb client driver for the ngx_lua based on the cosocket API
		</td>
	</tr>
</table>

### <a href="#nodejs" name="nodejs">NodeJS</a>

---

<table width="100%">
	<tr>
		<td width="21%">official <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/nodessdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
	<tr>
		<td width="21%">node-ssdb by @hit9</td>
		<td width="15%">hit9</td>
		<td width="20%">
			<a href="https://github.com/eleme/node-ssdb">Repository</a>
		</td>
		<td>
			node-ssdb by @hit9
		</td>
	</tr>
</table>

### <a href="#php" name="php">PHP</a>

---

<table width="100%">
	<tr>
		<td width="21%">built-in <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
	<tr>
		<td width="21%">official <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu, shen2</td>
		<td width="20%">
			<a href="https://packagist.org/packages/ssdb/phpssdb">Packagist</a>
			<a href="https://github.com/ssdb/phpssdb">Repository</a>
		</td>
		<td>
			Maintained by @shen2 in Packagist.
		</td>
	</tr>
	<tr>
		<td width="21%">phpssdb(PHP module)<span style="color: #cc3;">★</span></td>
		<td width="15%">jonnywang</td>
		<td width="20%">
			<a href="https://github.com/jonnywang/phpssdb">Repository</a>
		</td>
		<td>
			The SSDB PHP module.
		</td>
	</tr>
</table>

### <a href="#python" name="python">Python</a>

---

<table width="100%">
	<tr>
		<td width="21%">built-in <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb">Repository</a>
		</td>
		<td>
			This is the official client
		</td>
	</tr>
	<tr>
		<td width="21%">pyssdb</td>
		<td width="15%">ifduyue</td>
		<td width="20%">
			<a href="https://github.com/ifduyue/pyssdb">Repository</a>
		</td>
		<td>
			A SSDB Client Library for Python
		</td>
	</tr>
	<tr>
		<td width="21%">ssdb-py</td>
		<td width="15%">wrongwaycn</td>
		<td width="20%">
			<a href="https://github.com/wrongwaycn/ssdb-py">Repository</a>
		</td>
		<td>
			SSDB Python Client like Redis-Py
		</td>
	</tr>
	<tr>
		<td width="21%">ssdb.py</td>
		<td width="15%">hit9</td>
		<td width="20%">
			<a href="https://github.com/hit9/ssdb.py">Repository</a>
		</td>
		<td>
			SSDB Python Client Library by hit9
		</td>
	</tr>
</table>

### <a href="#ruby" name="ruby">Ruby</a>

---

<table width="100%">
	<tr>
		<td width="21%">ssdb-rb</td>
		<td width="15%">bsm</td>
		<td width="20%">
			<a href="https://github.com/bsm/ssdb-rb">Repository</a>
		</td>
		<td>
			Ruby client library for SSDB
		</td>
	</tr>
</table>

