<?php
include 'config.php';
include 'ini.php';

$is_debug	= FALSE;

if(!$is_debug && (bool)$_POST['prev_faucet_id'] ){
	$sql	= 'UPDATE `faucets` SET `until`=CURRENT_TIMESTAMP()+INTERVAL '.$_POST['cduratin'].' SECOND WHERE `id`='.$_POST['prev_faucet_id'];
	$result = $sql_obj->query( $sql );

	if( !$result ){
		$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
		echo '{"error":{"code":1,"message":"'.$message.'"}}';
		exit;
	}
}

$order	= (bool)mt_rand( 0, 1 )
	? '`duration` DESC'
	: 'RAND()';

$sql	=
'SELECT * FROM `faucets` WHERE 1=1 '.
	'AND `isactive` '.
	'AND TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) >= 0 '.
'ORDER BY '.$order.' LIMIT 1';

$result		= $sql_obj->query( $sql );

if( !$result ){
	$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
	echo '{"error":{"code":1,"message":"'.$message.'"}}';
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
// 	',"debug":"'.$order.'"'.
'}';