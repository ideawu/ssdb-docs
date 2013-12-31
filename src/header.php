<!DOCTYPE html>
<html lang="en">
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
		font-size: 180%;
		margin: 15px 0;
		padding-bottom: 6px;
		border-bottom: 1px solid #ddd;
	}
	h2{
		font-size: 150%;
	}
	h3{
		font-size: 130%;
	}
	h4{
		font-size: 110%;
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
				<li>
					<a href="https://github.com/ideawu/ssdb">
						<i class="glyphicon glyphicon-share-alt"></i> GitHub
					</a>
				</li>
				<li class="divider-vertical"></li>
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-list"></i> Docs <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="./index.html">Docs Home</a></li>
						<li class="divider"></li>
						<li><a href="./php/index.html">PHP API Doc</a></li>
						<li><a href="./cpp/index.html">C++ API Doc</a></li>
						<li><a href="./java/index.html">Java API Doc</a></li>
						<li><a href="./go/index.html">Go API Doc</a></li>
						<li class="divider"></li>
						<li><a href="./protocol.html">SSDB Network Protocol</a></li>
						<li><a href="./config.html">SSDB Configuration</a></li>
						<li class="divider"></li>
						<li><a href="./zh_cn/php/index.html">PHP 接口文档 (Chinese)</a></li>
						<li><a href="http://vdisk.weibo.com/s/dWpk2caREXGf" target="_blank">SSDB 入门基础(Chinese)</a></li>
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
						<li class="divider"></li>
						<li><a href="http://www.ideawu.net/blog/category/ssdb">博客(Chinese)</a></li>
					</ul>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>



<div class="container">
