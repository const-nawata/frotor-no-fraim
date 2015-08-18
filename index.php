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
		<td><button id="next_facet_btn" onclick="getNextFaucet();">Next</button></td>
	</tr>
</table>

<iframe id="main_fraim" src="startf.php" class="main-fraim"></iframe>

</body>

<script>
var prev_faucet_id=0;

function getNextFaucet(){

	$.ajax({
		method:"post",
		dataType: "json",
		url: "next.php",
		data:{"prev_faucet_id":prev_faucet_id,"cduratin":$("#cduraion").val()},

		success: function(faucet){
			if(faucet.error.code!=0){
				alert(faucet.error.message);
				return;
			}

			prev_faucet_id	= faucet.id;

			$("#db_id").html("id: "+faucet.id);
			$("#main_fraim").attr("src", faucet.url);
			$("#cduraion").val(faucet.duration);
    	},

    	error: function(){
			alert("Internal Error");
		}
    });
}

// $(document).ready(function(){

// });
</script>

</html>



