/**
 * 
 */

var faucet_id=0;

function enableAll(){

	$.ajax({
		method:"post",
		dataType: "json",
		url: "enable_all.php",
//		data:{"id":faucet_id},

		success: function(faucet){
			if(faucet.error.code!=0){
				alert(faucet.error.message);
				return;
			}
			
			alert("Success. Click next button.");
    	},

    	error: function(){
			alert("Internal Error while all enabling.");
		}
    });
	
}
//______________________________________________________________________________

function disableFaucet(){

	$.ajax({
		method:"post",
		dataType: "json",
		url: "disable.php",
		data:{"id":faucet_id},

		success: function(faucet){
			if(faucet.error.code!=0){
				alert(faucet.error.message);
				return;
			}
			
			alert("Success. Click next button.");
    	},

    	error: function(){
			alert("Internal Error while disabling.");
		}
    });
	
}
//______________________________________________________________________________

function getNextFaucet(){

	$.ajax({
		method:"post",
		dataType: "json",
		url: "next.php",
		data:{"prev_faucet_id":faucet_id,"cduratin":$("#cduraion").val()},

		success: function(faucet){
			if(faucet.error.code!=0){
				alert(faucet.error.message);
				return;
			}

			faucet_id	= faucet.id;

			$("#db_id").html("id: "+faucet.id);
			$("#main_fraim").attr("src", faucet.url);
			$("#cduraion").val(faucet.duration);
    	},

    	error: function(){
			alert("Internal Error while go to next.");
		}
    });
}
