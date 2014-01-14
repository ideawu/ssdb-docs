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

function parse_dir($input_dir, $output_dir){
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
			parse_dir($fullpath, $new_output_dir);
		}else{
			$ps = explode('.', $file);
			$ext = $ps[count($ps) - 1];
			if($ext == 'md'){
				gen_doc($fullpath, $output_dir, $template);
			}else if(!in_array($ext, array('php'))){
				copy($fullpath, "$output_dir/$file");
			}
		}
	}
}

function gen_doc($file, $output_dir, $template=null){
	$name = str_replace('.md', '', basename($file));
	$markdown = array(
			'name' => $name,
			'input_file' => $file,
			'output_file' => "$output_dir/$name.html",
			'title' => '',
			'html' => '',
			);
	if(file_exists($markdown['output_file']) && filemtime($file) < filemtime($markdown['output_file'])){
		echo "[skip] {$markdown['output_file']} => {$markdown['output_file']}\n";
		return;
	}

	$in_comment = false;
	$lines = file($file);
	foreach($lines as $line){
		if($line[0] == '`'){
			$in_commment = $in_commment? false:true;
		}
		if($line[0] == '#' && $line[1] != '#' && !$in_commment){
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
		$html = $markdown['html'];
	}

	echo "[build] {$markdown['output_file']} => {$markdown['output_file']}\n";
	file_put_contents($markdown['output_file'], $html);
}


