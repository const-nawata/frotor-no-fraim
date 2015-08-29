<?php
include 'config.php';
include 'ini.php';

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


//															All / Active
$count_all	= 
$count_act	= 0;

$sql	= "SELECT count(*) AS `count` FROM `faucets`";
$result		= $sql_obj->query( $sql );
if( !$result ){
	$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
	echo '{"error":{"code":1,"message":"'.$message.'"}}';
	exit;
}
$count_all	= $result->fetch_assoc()['count'];

$sql	=
'SELECT count(*) AS `count` FROM `faucets` WHERE 1=1 '.
	'AND `isactive` '.
	'AND TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) >= 0 '.
// 	'ORDER BY `updated` LIMIT 1'.
'';
$result		= $sql_obj->query( $sql );
if( !$result ){
	$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
	echo '{"error":{"code":1,"message":"'.$message.'"}}';
	exit;
}
$count_act	= $result->fetch_assoc()['count'];


//															Get Faucet
$sql	=
'SELECT * FROM `faucets` WHERE 1=1 '.
	'AND `isactive` '.
	'AND TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) >= 0 '.
'ORDER BY `updated` LIMIT 1';

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
	'"url":"'.$url.'","id":'.$id.',"duration":'.$duration.
	',"n_all":'.$count_all.',"n_act":'.$count_act.
// 	',"debug":"'.$dubug.'"'.
'}';