<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php
	$title = '一个快速的用来存储十亿级别列表数据的 NoSQL 数据库';
	if($markdown['title']){
		$title = $markdown['title'];
	}
	?>
	<title>SSDB - <?php echo $title; ?></title>
	<meta name="keywords" content="SSDB, SSDB 文档, LevelDB, Redis, LevelDB Server, zset" />
	<meta name="description" content="SSDB 是一个高性能 NoSQL 数据库, 使用 LevelDB 作为存储引擎, 支持 Redis 协议." />
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
	<!--
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" />
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
					<a href="http://www.ideawu.com/ssdb/zh_cn/">
						<i class="glyphicon glyphicon-home"></i> 首页
					</a>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-share-alt"></i> GitHub <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a target="_blank" href="https://github.com/ideawu/ssdb">项目</a></li>
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
						<li><a href="./config.html">配置</a></li>
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
					</ul>
				</li>
			</ul>


			<ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
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
