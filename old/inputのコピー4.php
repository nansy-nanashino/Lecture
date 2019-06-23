<?PHP
$filename='data.json';
if(is_readable($filename)){
	$handle=fopen($filename,'r');
	$contents=fread($handle,filesize($filename));
	$array = json_decode($contents);
	fclose($handle);
	//var_dump($object->users[0]->name);
	//var_dump($array);

	if(isset($_GET["sub"])){
		$btn=$_GET["sub"];
		switch($btn){
			case "Registration":if(is_writable($filename)){
						    $array=array();
						    $fp = fopen($filename,'w');
						    //var_dump($array); 
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

			case  "delete": if(is_writable($filename)){

						$fp = fopen($filename,'w');
						$array=array();
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
}

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
<button type="submit" name="sub" value="Registration">送信</button>
</form>
<h1>
<form action="" method="get">
<ul>
<?php
foreach ($array as $user) {  ?>
	<li><?php echo $user->name?><br>
		<?php echo $user->birthday?><br>
		<?php echo $user->email ?></li>
		<button type="submit" name="sub" value="delete">削除</button>
		<?php } ?>
		</form>
		</ul>
		</h1>
		</body>
		<html> 

