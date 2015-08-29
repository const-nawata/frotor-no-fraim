<?php

function get_all_faucets_count(){
	global $sql_obj;

	$sql	= "SELECT count(*) AS `count` FROM `faucets`";

	$result		= $sql_obj->query( $sql );

	if( !$result )
		return FALSE;

	return $result->fetch_assoc()['count'];
}
//______________________________________________________________________________

function get_act_faucets_count(){
	global $sql_obj;

	$sql	=
'SELECT count(*) AS `count` FROM `faucets` WHERE 1=1 '.
	'AND `isactive` '.
	'AND TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) >= 0 '.
	'';

	$result		= $sql_obj->query( $sql );

	if( !$result )
		return FALSE;

	return $result->fetch_assoc()['count'];
}
//______________________________________________________________________________

function get_faucet(){
	global $sql_obj;

	$sql	=
	'SELECT * FROM `faucets` WHERE 1=1 '.
		'AND `isactive` '.
		'AND TIMESTAMPDIFF(SECOND,`until`,CURRENT_TIMESTAMP()) >= 0 '.
	'ORDER BY `updated` LIMIT 1';

	$result		= $sql_obj->query( $sql );

	if( !$result )
		return FALSE;

	$row	= $result->fetch_assoc();

	return $row;
}
//______________________________________________________________________________

function get_sql_err_mess(){
	global $sql_obj;

	return 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
}
//______________________________________________________________________________
