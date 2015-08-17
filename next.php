<?php

include 'config.php';
include 'ini.php';


if( $_POST['prev_faucet_id'] ){
	$sql	= 'UPDATE `faucets` SET `visited`=CURRENT_TIMESTAMP() WHERE `id`='.$_POST['prev_faucet_id'];
	$result = $sql_obj->query( $sql );

	if( !$result ){
		$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
		echo '{'.
		'"error":{"code":1,"message":"'.$message.'"}'.
	'}';
	exit;
	}
}

$sql	=
'SELECT *, TIMESTAMPDIFF(SECOND,`visited`,CURRENT_TIMESTAMP()) AS `diff` FROM `faucets` '.
'WHERE 1=1 '.
'AND `isactive` '.
'AND TIMESTAMPDIFF(SECOND,`visited`,CURRENT_TIMESTAMP()) >= `duration` LIMIT 1'.
'';

$result		= $sql_obj->query( $sql );

if( !$result ){
	$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
	echo '{'.
	'"error":{"code":1,"message":"'.$message.'"}'.
'}';
exit;
}

$row	= $result->fetch_assoc();
$url	= $row['url'].($row['referal']!=''?'?r='.$row['referal']:'');

echo '{'.
	'"error":{"code":0,"message":"Success"},'.
	'"url":"'.$url.'","id":"'.$row['id'].'"'.
'}';