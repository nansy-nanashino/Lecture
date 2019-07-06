<?PHP
$filename='data.json';

if(is_readable($filename)){
	$handle=fopen($filename,'r');
	$contents=fread($handle,filesize($filename));
	$array = json_decode($contents);
	fclose($handle);
	
	//ボタンの内容取得
	if (isset($_GET["sub"])){
		$btn=$_GET["sub"];
		
		switch($btn){
			//更新処理
			case "registration":
				if(is_writable($filename)){
					$fp = fopen($filename,'w');
					//$array=array();
					array_push(
							$array,(object)array(
								'name'=>$_GET['username'],
								'birthday'=>$_GET['birthday'],
								'email'=>$_GET['email']
								)			

						  );
					//echo $array;
					//var_dump($array);
					$json=json_encode($array);
					fwrite($fp,$json);
					fclose($fp);
				}else{
					echo "書き込みできません\n";
				};

				break;
			//全削除処理
			case "alldelete":
				if(is_writable($filename)){
					$fp = fopen($filename,'w');
					$array=array();

					//echo $array;
					//var_dump($array);
					$json=json_encode($array);
					fwrite($fp,$json);
					fclose($fp);
				}else{
					echo "書き込みできません\n";
				};
				break;
			//単品削除処理
			case "delete": 
				if(is_writable($filename)){
					$fp = fopen($filename,'w');
					$num=(int)$_GET["id"];
					
					unset($array[$num]);
					$array = array_values($array);

					$json=json_encode($array);
					fwrite($fp,$json);
					fclose($fp);
				}else{
					echo "書き込みできません\n";

				};
				break;
		}
	}	
}else{
	echo "ファイルがありません\n";
};


//エラーログ
error_log(print_r($array, true));
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
<form action="" method="get">
<ul>
<?php 
$n=0;//id用の変数
foreach ($array as $user) {  
?>
<li>
<?php echo $user->name?>
<br>
<?php echo $user->birthday?>
<br>
<?php echo $user->email ?>
<input type="hidden" name="id" value="<?php echo$n++;?>">
<button type="submit" name="sub" value="delete">削除</button>
</form>
<form action="update.php" method="get">
<button type="submit" name="sub" value="update1">更新</button>
</form>
</li>
<?php } ?>
</form>
</ul>
</h1>
</body>
</html> 
