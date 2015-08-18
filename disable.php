<?php
include 'config.php';
include 'ini.php';

$sql	= 'UPDATE `faucets` SET `isactive`=FALSE WHERE `id`='.$_POST['id'];
$result = $sql_obj->query( $sql );

if( !$result ){
	$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
	echo '{"error":{"code":2,"message":"'.$message.'"}}';
}else
	echo '{"error":{"code":0,"message":"Success"}}';
