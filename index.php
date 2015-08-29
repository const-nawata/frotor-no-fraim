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
		<td id="id_td" class="db-id-td hided" >id: undefined</td>

		<td id="act_after_td" class="time-control hided">Show after
			<input type="text" id="cduraion" name="cduraion" class="time-inp" /> sec.
			<input type="hidden" id="oduraion" name="oduraion" />
		</td>

		<td id="refresh_td" class="hided"><button id="refresh_btn" onclick="refresh();">Refresh</button></td>
		<td id="disable_td" class="hided"><button id="disable_btn" onclick="disableFaucet();">Disable</button></td>
		<td><button id="enable_all_btn" onclick="enableAll();">Enable All</button></td>
		<td class="enable-td"><button id="next_facet_btn" onclick="getNextFaucet();">Next</button></td>
		<td class="num-info-td">Faucets: <span id="n_all_span">155</span> / <span id="n_active_span">27</span></td>

	</tr>
</table>

<iframe id="main_fraim" src="startf.php" class="main-fraim"></iframe>

</body>

<script>

$(document).ready(function(){
// 	$(".hided").hide();
	getNextFaucet();
});

</script>

</html>



