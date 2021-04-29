<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php
	$title = '高性能的支持丰富数据结构的 NoSQL 数据库, 替代 Redis';
	if($markdown['title']){
	$title = $markdown['title'];
	}
	?>
	<title>SSDB - <?php echo $title; ?></title>
	<meta name="keywords" content="SSDB, SSDB 文档, LevelDB, Redis, LevelDB Server, zset" />
	<meta name="description" content="SSDB 是一个高性能 NoSQL 数据库, 使用 LevelDB 作为存储引擎, 支持 Redis 协议." />
	<link href="<?php echo $base_url?>/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $base_url?>/css/style.css" rel="stylesheet" />
</head>
<body>



<?php include(dirname(__FILE__) . $base_url . '/zh_cn/template_nav.php'); ?>

<div class="container">

<?php
echo $markdown['html'];
?>

<!-- #############  -->
<hr>


<div class="footer">
	Copyright &copy; 2013 - <?=date('Y')?> <a href="https://ssdb.io/">ssdb.io</a>. All rights reserved.
	<?php echo 'Updated: ' . date('Y-m-d H:i:s O'); ?>
	<?php
	$hostname = @exec('hostname');
	if(strpos($hostname, 'ideawu') !== false){
	?>
	<div style="display: none;">
	<script type="text/javascript">
	<!--
	document.write(unescape("| %3Cscript src='http://js.users.51.la/414722.js' type='text/javascript'%3E%3C/script%3E"));
	//-->
	</script>
	</div>
	<?php } ?>
</div>

</div> <!-- /container -->

<script src="<?php echo $base_url?>/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo $base_url?>/js/bootstrap.min.js"></script>

</body>
</html>
