
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="http://ssdb.io/zh_cn/">SSDB</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="divider-vertical"></li>
				<li>
					<a href="http://ssdb.io/zh_cn/">
						<i class="glyphicon glyphicon-home"></i> 首页
					</a>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-share-alt"></i> GitHub <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a target="_blank" href="https://github.com/ideawu/ssdb">源码</a></li>
						<li><a target="_blank" href="https://github.com/ideawu/ssdb-docs">文档</a></li>
					</ul>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-list"></i> 文档 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="./index.html">文档首页</a></li>
						<li class="divider"></li>
						<li><a href="./install.html">安装</a></li>
						<li><a href="./config.html">配置</a></li>
						<li><a href="./commands.html">命令</a></li>
						<li><a href="./clients.html">客户端 SDK</a></li>
						<li><a href="./protocol.html">SSDB 网络协议</a></li>
						<li class="divider"></li>
						<li><a href="./php/index.html">PHP API 文档</a></li>
						<li><a href="../cpp/index.html">C++ API 文档(英文)</a></li>
						<li><a href="../java/index.html">Java API 文档(英文)</a></li>
						<li><a href="../go/index.html">Go API 文档(英文)</a></li>
						<li class="divider"></li>
						<li><a href="http://vdisk.weibo.com/s/dWpk2caREXGf" target="_blank">SSDB 入门基础</a></li>
					</ul>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i> 讨论 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="https://github.com/ideawu/ssdb/issues">Issue Tracker</a></li>
						<li><a href="http://www.ideawu.net/blog/category/ssdb">博客</a></li>
						<li><a href="./users.html">用户案例</a></li>
					</ul>
				</li>
			</ul>


			<ul class="nav navbar-nav navbar-right" style="margin-top: 9px;">
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
						当前语言: 简体中文
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#" onclick="set_lang('en');">English</a></li>
						<li><a href="#" onclick="set_lang('zh_cn');">简体中文</a></li>
					</ul>
				</div>
			</ul>
			<script>
			function set_lang(lang){
				var url = location.href.replace(/lang=\w+&?/g, '').replace(/\?+$/, '');
				var ps = url.split('/');
				var index = ps.indexOf('docs');
				if(ps[index + 1] == 'zh_cn'){
					ps.splice(index + 1, 1);
				}else{
					ps.splice(index + 1, 0, 'zh_cn');
				}
				url = ps.join('/');
				location.href = url;
				return false;
			}
			</script>

		</div><!--/.nav-collapse -->
	</div>
</div>


