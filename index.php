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
	<iframe id="main_fraim" src="startf.php" class="main-fraim"></iframe>
	<button id="next_facet_btn" onclick="getNextFaucet();">Next</button>
</body>

<script>
var prev_faucet_id=0;

function getNextFaucet(){

	$.ajax({
		method:"post",
		dataType: "json",
		url: "next.php",
		data:{"prev_faucet_id":prev_faucet_id},

		success: function(faucet){
			if(faucet.error.code!=0){
				alert(faucet.error.message);
				return;
			}

			prev_faucet_id	= faucet.id;
			$("#main_fraim").attr("src", faucet.url);
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



