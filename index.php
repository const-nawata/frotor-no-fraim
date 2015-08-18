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

<table>
	<tr>
		<td id="db_id" class="db-id-td">id: undefined</td>
		<td class="time-control">Updated in <input type="text" id="cduraion" name="cduraion" class="time-inp"> sec.</td>
		<td class=""><button id="disable_facet_btn" onclick="disableFaucet();">Disable</button></td>
		<td class="disable-td"><button id="disable_facet_btn" onclick="enableAll();">Enable All</button></td>
		<td><button id="next_facet_btn" onclick="getNextFaucet();">Next</button></td>
	</tr>
</table>

<iframe id="main_fraim" src="startf.php" class="main-fraim"></iframe>

</body>

<script>

// $(document).ready(function(){

// });

</script>

</html>



