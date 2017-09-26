# 客户端

<div class="alert alert-info">
	SSDB 支持 Redis 网络协议, 所以你可以用 Redis 的客户端来连接 SSDB 服务器. 但是, 使用 SSDB 客户端是最高效的方式.
	<br/><br/>
	所有的 SSDB 客户端 API 都是支持二进制数据的, 二进制数据即是字符串, 字符串就是二进制数据.
</div>

SSDB 源码仓库中, 内置了许多语言的客户端, 这些便是所谓的__官方客户端__. 另外, 还有许多开发者开发的客户端, 也列在这里.

推荐的客户端会被打上星号标记 <span style="color: #cc3;">★</span>.

如果你开发了一个客户端, 希望列在这个页面的话, 请在 GitHub 上 fork [ssdb-docs 项目](https://github.com/ideawu/ssdb-docs), 编辑 ```clients.md```, 然后提交一个 Pull Request.

### <a href="#cpp" name="cpp">C++</a>

---

<table width="100%">
	<tr>
		<td width="21%">内置 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb/tree/master/api/cpp">Repository</a>
		</td>
		<td>
			官方客户端
		</td>
	</tr>
	<tr>
		<td width="21%">cppssdb</span></td>
		<td width="15%">ironsdu</td>
		<td width="20%">
			<a href="https://github.com/IronsDu/ssdb-cpp-api">Repository</a>
		</td>
		<td>
			C++ 11 异步 API 客户端
		</td>
	</tr>
</table>

### <a href="#cpy" name="cpy">Cpy</a>

---

<table width="100%">
	<tr>
		<td width="21%">内置 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb/tree/master/api/cpy">Repository</a>
		</td>
		<td>
			官方客户端. see [Cpy](https://github.com/ideawu/cpy).
		</td>
	</tr>
</table>

<h3><a href="#cs" name="cs">C# .Net</a></h3>

---

<table width="100%">
	<tr>
		<td width="21%">官方 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/dotnetssdb">Repository</a>
		</td>
		<td>
			官方客户端
		</td>
	</tr>
</table>



### <a href="#erlang" name="erlang">Erlang</a>

---

<table width="100%">
	<tr>
		<td width="21%">ssdb-erlang</td>
		<td width="15%">kqqsysu</td>
		<td width="20%">
			<a href="https://github.com/kqqsysu/ssdb-erlang">Repository</a>
		</td>
		<td>
			Erlang client library for SSDB
		</td>
	</tr>
</table>



### <a href="#go" name="go">Go</a>

---

<table width="100%">
	<tr>
		<td width="21%">官方 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/gossdb">Repository</a>
		</td>
		<td>
			官方客户端
		</td>
	</tr>
	<tr>
		<td width="21%">hissdb</td>
		<td width="15%">Eryx</td>
		<td width="20%">
			<a href="https://github.com/lessos/lessgo/tree/master/data/hissdb">Repository</a>
		</td>
		<td>
			在 lessos/lessgo 项目中的 hissdb, 支持连接池.
		</td>
	</tr>
	<tr>
		<td width="21%">gossdb</td>
		<td width="15%">seefan</td>
		<td width="20%">
			<a href="https://github.com/seefan/gossdb">Repository</a>
		</td>
		<td>
			从官方客户端派生出来的客户端，支持连接池，使用习惯与大多数客户端保持一致。
		</td>
	</tr>
</table>

### <a href="#java" name="java">Java</a>

---

<table width="100%">
	<tr>
		<td width="21%">官方 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/javassdb">Repository</a>
		</td>
		<td>
			官方客户端
		</td>
	</tr>
	<tr>
		<td width="21%">ssdb4j</td>
		<td width="15%">nutzam</td>
		<td width="20%">
			<a href="https://github.com/nutzam/ssdb4j">Repository</a>
		</td>
		<td>
			又一个SSDB的Java驱动
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
	<tr>
		<td width="21%">hydrogen-ssdb</td>
		<td width="15%">yiding-he</td>
		<td width="20%">
			<a href="https://github.com/yiding-he/hydrogen-ssdb">Repository</a>
		</td>
		<td>
			支持多线程并发请求和多服务器的负载均衡(客户端分发请求)
		</td>
	</tr>
	<tr>
		<td width="21%">vertx-ssdb</td>
		<td width="15%">DavidQuan</td>
		<td width="20%">
			<a href="https://github.com/DavidQuan/vertx-ssdb">Repository</a>
		</td>
		<td>
			Vert.x ssdb client
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
	<tr>
		<td width="21%">DBSS</td>
		<td width="15%">reficull</td>
		<td width="20%">
			<a href="https://github.com/reficull/dbss">Repository</a>
		</td>
		<td>
			Luajit 使用的客户端，我用在C++游戏服中，lua直接连ssdb 
		</td>
	</tr>
</table>

### <a href="#nodejs" name="nodejs">NodeJS</a>

---

<table width="100%">
	<tr>
		<td width="21%">官方 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ssdb/nodessdb">Repository</a>
		</td>
		<td>
			官方客户端
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
		<td width="21%">内置 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb/tree/master/api/php">Repository</a>
		</td>
		<td>
			官方客户端
		</td>
	</tr>
	<tr>
		<td width="21%">phpssdb</td>
		<td width="15%">jonnywang</td>
		<td width="20%">
			<a href="https://github.com/jonnywang/phpssdb">Repository</a>
		</td>
		<td>
			用 C 写的 PHP 模块.
		</td>
	</tr>
</table>

### <a href="#python" name="python">Python</a>

---

<table width="100%">
	<tr>
		<td width="21%">内置 <span style="color: #cc3;">★</span></td>
		<td width="15%">ideawu</td>
		<td width="20%">
			<a href="https://github.com/ideawu/ssdb/tree/master/api/python">Repository</a>
		</td>
		<td>
			官方客户端
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

### <a href="#swift" name="swift">Swift</a>

---

<table width="100%">
	<tr>
		<td width="21%">SwiftSSDB</td>
		<td width="15%">kirilltitov</td>
		<td width="20%">
			<a href="https://github.com/kirilltitov/SwiftSSDB">Repository</a>
		</td>
		<td>
			Swift client library for SSDB
		</td>
	</tr>
</table>



