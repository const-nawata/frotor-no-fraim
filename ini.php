<?php
global $sql_obj;

$sql_obj = new mysqli( $host, $user, $pass, $db);

if( mysqli_connect_errno() )
	die( printf( 'MySQL Server connection failed: %s', mysqli_connect_error() ) );
