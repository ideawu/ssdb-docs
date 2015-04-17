<?php
/*****************************************************
 * A PHP script to parse markdown files, and generate
 * HTML files.
 * @author ideawu
 * @link http://www.ideawu.com/
 *
 * Usage:
 *     php gen_doc.php md_dir output_dir
 *****************************************************/
$input_dir = isset($argv[1])? $argv[1] : '.';
$output_dir = isset($argv[2])? $argv[2] : './output';

$input_dir = rtrim($input_dir, '/');
$output_dir = rtrim($output_dir, '/');

parse_dir($input_dir, $output_dir);

function parse_dir($input_dir, $output_dir, $base_url='.'){
	if(!file_exists($output_dir)){
		mkdir($output_dir);
	}
	$template = "$input_dir/template.php";
	if(!file_exists($template)){
		$template = null;
	}

	$files = scandir($input_dir);
	foreach($files as $file){
		if($file == '.' || $file == '..'){
			continue;
		}
		$fullpath = "$input_dir/$file";

		if(is_dir($fullpath)){
			$new_output_dir = $output_dir . '/' . $file;
			parse_dir($fullpath, $new_output_dir, "$base_url/..");
		}else{
			$ps = explode('.', $file);
			$ext = $ps[count($ps) - 1];
			if($ext == 'md'){
				gen_doc($fullpath, $output_dir, $template, $base_url);
			}else if(!in_array($ext, array('php'))){
				copy($fullpath, "$output_dir/$file");
			}
		}
	}
}

function gen_doc($file, $output_dir, $template=null, $base_url=''){
	$name = str_replace('.md', '', basename($file));
	$markdown = array(
			'name' => $name,
			'input_file' => $file,
			'output_file' => "$output_dir/$name.html",
			'title' => '',
			'html' => '',
			'base_url' => $base_url,
			);
	if(file_exists($markdown['output_file']) && filemtime($file) < filemtime($markdown['output_file'])){
		echo "[skip] {$markdown['output_file']} => {$markdown['output_file']}\n";
		return;
	}

	$in_comment = false;
	$lines = file($file);
	foreach($lines as $line){
		if($line[0] == '`'){
			$in_comment = $in_comment? false:true;
		}
		if($line[0] == '#' && $line[1] != '#' && !$in_comment){
			$line = trim($line);
			$line = trim($line, '#');
			$line = trim($line);
			$markdown['title'] = $line;
		}
	}

	$cmd = "python -m markdown -x tables -x fenced_code -x headerid $file";
	exec($cmd, $result, $retval);
	$markdown['html'] = join("\n", $result);

	if($template){
		ob_start();
		include($template);
		$html = ob_get_clean();
	}else{
		$html = default_template($markdown);
	}

	echo "[build] {$markdown['output_file']} => {$markdown['output_file']}\n";
	file_put_contents($markdown['output_file'], $html);
}

function default_template($markdown){
	$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>{$markdown['title']}</title>
	<style type="text/css">
	body{
		font-size: 14px;
		font-family: arial;
		background: #fff;
	}
	</style>
</head>
<body>
	{$markdown['html']}
</body>
</html>
HTML;
	return $html;
}
