<?PHP

$filename='data.json';
if(is_writable($filename)){
	$fp = fopen("$filename",'a');
	$array = array_push(
			$array->users,array(
				array('name'=>$_GET['username']),
				)
		      );
	$json=json_encode($array);
	fwrite($fp,$json);
	fclose($fp);

}else{
	echo "書き込みできません\n";
};


if(is_readable($filename)){
	$handle=fopen($filename,'r');
	$contents=fread($handle,filesize($filename));
	$object = json_decode($contents);
	fclose($handle);
	//	var_dump($object->users[0]->name);
	var_dump($object);
}else{
	echo "ファイルがありません\n";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<form action="" method="get">
<input name="username" type="textbox">
<button>送信</button>
</form>
<h1>
<ul>
<?php foreach ($object->users as $user) {  ?>
	<li><?php echo $user->name ?></li>
		<?php } ?>
</ul>
</h1>
</body>
<html> 


