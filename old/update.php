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
		
		//header( "Location:input.php" );
		//exit();
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
<button type="submit" onclick="location.href='./input.php'" name="sub" value="registration">送信</button>
</form>
<button type="submit" onclick="location.href='./input.php'" value="戻る">戻る</button>
<h1>
</h1>
</body>
</html> 

