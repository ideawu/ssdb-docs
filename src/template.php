<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php
	$title = 'A high performance NoSQL database supporting many data structures, an alternative for Redis';
	if($markdown['title']){
		$title = $markdown['title'];
	}
	?>
	<title>SSDB - <?php echo $title; ?></title>
	<meta name="keywords" content="SSDB, LevelDB, Redis, LevelDB Server, zset" />
	<meta name="description" content="SSDB is a NoSQL database server written in C/C++, it is fast, supports online backup and master-slave replication." />
	<link href="<?php echo $base_url?>/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $base_url?>/css/style.css" rel="stylesheet" />
	<!--
	<link href="<?php echo $base_url?>/css/bootstrap-theme.min.css" rel="stylesheet" />
	-->
</head>
<body>


<?php require(dirname(__FILE__) . '/' . $base_url . '/template_nav.php'); ?>


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
