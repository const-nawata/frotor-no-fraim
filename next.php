<?php

include 'config.php';
include 'ini.php';


if( $_POST['prev_faucet_id'] ){
	$sql	= 'UPDATE `faucets` SET `until`=CURRENT_TIMESTAMP()+'.$_POST['cduratin'].' WHERE `id`='.$_POST['prev_faucet_id'];
	$result = $sql_obj->query( $sql );

	if( !$result ){
		$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
		echo '{"error":{"code":1,"message":"'.$message.'"}}';
		exit;
	}
}

$sql	=
'SELECT * '.

// ',TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) AS `diff` '.

'FROM `faucets` '.
'WHERE 1=1 '.
'AND `isactive` '.
'AND TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) >= 0 '.
'LIMIT 1'.
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

$url	= 'nofaucet.php';
$duration =
$id	= 0;

if( is_array($row) ){
	$url	= $row['url'].($row['referal']!=''?'?r='.$row['referal']:'');
	$id	= $row['id'];
	$duration	= $row['duration'];
}

echo '{'.
	'"error":{"code":0,"message":"Success"},'.
	'"url":"'.$url.'","id":"'.$id.'","duration":"'.$duration.'"'.
// 	',"diff":"'.$row['diff'].'"'.
'}';