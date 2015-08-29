<?php
include 'config.php';
include 'ini.php';
include 'functions.php';

$count_all	= get_all_faucets_count();
if( $count_all === FALSE ){
	echo '{"error":{"code":1,"message":"'.get_sql_err_mess().'"}}';
	exit;
}

$count_act	= get_act_faucets_count();
if( $count_act === FALSE ){
	echo '{"error":{"code":2,"message":"'.get_sql_err_mess().'"}}';
	exit;
}


echo '{'.
	'"error":{"code":0,"message":"Success"}'.
	',"n_all":'.$count_all.',"n_act":'.$count_act.
// 	',"debug":"'.$dubug.'"'.
'}';