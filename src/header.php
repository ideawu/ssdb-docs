<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php
	$title = 'A fast NoSQL database for storing big list of data';
	if($markdown['title']){
		$title = $markdown['title'];
	}
	?>
	<title>SSDB - <?php echo $title; ?></title>
	<meta name="keywords" content="SSDB, LevelDB, Redis, LevelDB Server, zset" />
	<meta name="description" content="SSDB is a NoSQL database server written in C/C++, it is fast, supports online backup and master-slave replication." />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!--
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" />
	-->
	<style type="text/css">
	body{
		padding-top: 50px;
		padding-bottom: 10px;
		font-size: 14px;
		font-family: arial;
		background: #fff;
	}
	.container{
		width: 880px;
	}
	.navbar{
	}
	.navbar .divider-vertical {
		background-color: #222222;
		border-right: 1px solid #333333;
		height: 50px;
		overflow: hidden;
		width: 1px;
	}
	.footer{
		text-align: center;
	}
	p{
		margin: 12px 0;
	}
	td{
		padding: 4px;
	}
	h1{
		font-weight: bold;
		font-size: 170%;
		margin: 15px 0;
		padding-bottom: 6px;
		border-bottom: 1px solid #ddd;
	}
	h2{
		font-weight: bold;
		font-size: 140%;
	}
	h3{
		font-weight: bold;
		font-size: 120%;
	}
	h4{
		font-weight: bold;
		font-size: 105%;
	}
	</style>
</head>
<body>



<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="http://www.ideawu.com/ssdb/">SSDB</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="divider-vertical"></li>
				<li>
					<a href="http://www.ideawu.com/ssdb/">
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
						<li><a href="./index.html">Docs Home</a></li>
						<li class="divider"></li>
						<li><a href="./install.html">Installation</a></li>
						<li><a href="./config.html">Configuration</a></li>
						<li><a href="./protocol.html">SSDB Network Protocol</a></li>
						<li class="divider"></li>
						<li><a href="./php/index.html">PHP API Doc</a></li>
						<li><a href="./cpp/index.html">C++ API Doc</a></li>
						<li><a href="./java/index.html">Java API Doc</a></li>
						<li><a href="./go/index.html">Go API Doc</a></li>
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
						<li><a href="./users.html">User Cases</a></li>
					</ul>
				</li>
			</ul>


			<ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
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
				var langs = ['en', 'zh_cn'];
				var url = location.href;
				var ps = url.split('/');
				var curr_lang = ps[ps.length - 2];
				if(langs.indexOf(curr_lang) == -1){
					curr_lang = 'en';
				}
				if(curr_lang == lang){
					return false;
				}
				if(curr_lang == 'en' && lang != 'en'){
					// insert
					ps.splice(ps.length - 1, 0, lang);
				}else if(curr_lang != 'en' && lang == 'en'){
					// remove
					ps.splice(ps.length - 2, 1);
				}else{
					// replace
					ps[ps.length - 2] = lang;
				}
				url = ps.join('/');
				location.href = url;
				return false;
			}
			</script>

		</div><!--/.nav-collapse -->
	</div>
</div>



<div class="container">
