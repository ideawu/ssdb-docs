<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="http://ssdb.io/">SSDB</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="divider-vertical"></li>
				<li>
					<a href="http://ssdb.io/">
						<i class="glyphicon glyphicon-home"></i> Home
					</a>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-share-alt"></i> GitHub <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a target="_blank" href="https://github.com/ideawu/ssdb">Source Code</a></li>
						<li><a target="_blank" href="https://github.com/ideawu/ssdb-docs">Documentation</a></li>
					</ul>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-list"></i> Docs <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $base_url?>/index.html">Docs Home</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $base_url?>/install.html">Installation</a></li>
						<li><a href="<?php echo $base_url?>/config.html">Configuration</a></li>
						<li><a href="<?php echo $base_url?>/commands/index.html">Commands</a></li>
						<li><a href="<?php echo $base_url?>/clients.html">Clients</a></li>
						<li><a href="<?php echo $base_url?>/protocol.html">SSDB Network Protocol</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $base_url?>/php/index.html">PHP API Doc</a></li>
						<li><a href="<?php echo $base_url?>/cpp/index.html">C++ API Doc</a></li>
						<li><a href="<?php echo $base_url?>/java/index.html">Java API Doc</a></li>
						<li><a href="<?php echo $base_url?>/go/index.html">Go API Doc</a></li>
					</ul>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i> Discuss <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="https://github.com/ideawu/ssdb/issues">Issue Tracker</a></li>
						<li><a href="http://www.ideawu.com/blog/category/ssdb">Blog</a></li>
						<li><a href="<?php echo $base_url?>/users.html">User Cases</a></li>
					</ul>
				</li>
			</ul>


			<ul class="nav navbar-nav navbar-right" style="margin-top: 9px;">
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
						Language: English
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
				if(lang == 'en' && ps[index + 1] == 'zh_cn'){
					ps.splice(index + 1, 1);
				}else if(lang == 'zh_cn' && ps[index + 1] != 'zh_cn'){
					ps.splice(index + 1, 0, 'zh_cn');
				}else{
					return false;
				}
				url = ps.join('/');
				location.href = url;
				return false;
			}
			</script>

		</div><!--/.nav-collapse -->
	</div>
</div>
