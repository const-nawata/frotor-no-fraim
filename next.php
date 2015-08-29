<?php
include 'config.php';
include 'ini.php';
include 'functions.php';

$is_debug	= FALSE;

//															Update
$prv_faucet_id	= $_POST['prev_faucet_id'];
$cduratin	= (int)$_POST['cduratin'];
$oduratin	= (int)$_POST['oduratin'];

if(!$is_debug && (bool)$prv_faucet_id ){

	$updated	= ($cduratin == $oduratin) ? ', `updated`=NOW() ' : '';

	$sql	= 'UPDATE `faucets` SET `until`=CURRENT_TIMESTAMP()+INTERVAL '.$cduratin.' SECOND'.$updated.' WHERE `id`='.$prv_faucet_id;

	$result = $sql_obj->query( $sql );

	if( !$result ){
		$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
		echo '{"error":{"code":1,"message":"'.$message.'"}}';
		exit;
	}
}

$row	= get_faucet();
if( $row === FALSE ){
	echo '{"error":{"code":3,"message":"'.get_sql_err_mess().'"}}';
	exit;
}

$url	= 'nofaucet.php';

$duration	=
$id			= 0;

if( is_array($row) ){
	$url	= $row['url'].($row['referal']!=''?'?r='.$row['referal']:'');
	$id	= $row['id'];
	$duration	= $row['duration'];
}

echo '{'.
	'"error":{"code":0,"message":"Success"}'.
	',"url":"'.$url.'","id":'.$id.',"duration":'.$duration.
// 	',"debug":"'.$dubug.'"'.
'}';