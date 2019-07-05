<?php
$filename = 'data.json';
if(is_readable($filename)){
	$handle=fopen($filename,'r');
	$contents=fread($handle,filesize($filename));
	$array = json_decode($contents);
	fclose($handle);

	if(is_writable($filename)){
		$fp = fopen($filename,'w');
		//$array=array();
		$num=(int)$_GET["id"];	
		$array[$num]=(object)array(
				'name'=>$_GET['username'],
				'birthday'=>$_GET['birthday'],
				'email'=>$_GET['email']
				);		


			//echo $array;
			//var_dump($array);
			$json=json_encode($array);
		fwrite($fp,$json);
		fclose($fp);
	}else{
		echo "書き込みできません\n";
	
	}

}else{
	echo "ファイルがありません\n";
};
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<form action="" method="get">
<input name="username" type="textbox"><br>
<input name="birthday" type="textbox"><br>
<input name="email" type="textbox"><br>
<button type="submit" name="sub" value="registration">送信</button>
<button type="submit" name="sub" value="alldelete">全て削除</button>
</form>
<h1>
</h1>
</body>
</html> 

