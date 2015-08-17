<?php
include 'config.php';
include 'ini.php';

$sql	=
'SELECT *, TIMESTAMPDIFF(SECOND,`visited`,CURRENT_TIMESTAMP()) AS `diff` FROM `faucets` '.
'WHERE 1=1 '.
'AND `isactive` '.
'AND TIMESTAMPDIFF(SECOND,`visited`,CURRENT_TIMESTAMP()) >= `duration` LIMIT 1'.
'';


$result		= $sql_obj->query( $sql );

if( !$result ){
	$message	= 'MySQL error: '.$sql_obj->errno.' / '.$sql_obj->error;
	die( $message );
}

$row	= $result->fetch_assoc();
$url	= $row['url'].($row['referal']!=''?'?r='.$row['referal']:'');

echo '<pre style="text-align:left;font-size:10px;">'.print_r( $row, true ).'</pre>'."<br>url: $url";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>FRotor</title>

	<link rel="stylesheet" href="public/css/main.css" type="text/css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="public/js/main.js"></script>
</head>

<body>

<!--
	<iframe id="main_fraim" src="http://coinator.net/btc/" class="main-fraim"></iframe>
	<button onclick="$('#main_fraim').attr('src', 'http://earnbitcoinonline.com/');">Next</button>
 -->


</body>
</html>



