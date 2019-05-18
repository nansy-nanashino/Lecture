<?php


$filename="data.txt2";
if(is_readable($filename)){
	$handle=fopen($filename,"r");
	$contents=fread($handle,filesize($filename));
	fclose($handle);
	echo $contents;
}else{
	echo "ファイルがありません\n";
}
//$a = 1;
//echo "$a";
//echo '$a';

?>
