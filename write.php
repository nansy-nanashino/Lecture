<?php
$filename='data.txt';
if(is_writable($filename)){
	$fp = fopen("$filename",'w');
	fwrite($fp,"aaa\n");
	fwrite($fp,"bbb\n");
	fwrite($fp,"ccc\n");
	fwrite($fp,"ddd\n");
}else{
	"書き込みできません\n";
}
?>
