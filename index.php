<?php
include 'config.php';    //		iframe.attr('src', locations[++i % len]);
include 'ini.php';
// echo "Local faucet rotator!!!";     //	Local BitCoin faucets rotator
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


	<iframe id="main_fraim" src="http://coinator.net/btc/" class="main-fraim"></iframe>

	<button onclick="$('#main_fraim').attr('src', 'http://earnbitcoinonline.com/');">Next</button>

</body>
</html>



