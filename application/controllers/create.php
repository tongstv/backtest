<?php
$argv=isset($argv) ? $argv : $_SERVER['argv'];

$file = file_get_contents(dirname(__FILE__)."/Demo.php");

$controller = ucfirst($argv[1]);

$content=str_replace(array('Demo'),array($controller),$file);

$newfile = ucfirst($argv[1]).".php";



file_put_contents(dirname(__FILE__)."/".$newfile,$content);









