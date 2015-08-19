/**
 *        
 */

var faucet_id=0
	,faucet_url=""
;

function refresh(){
	$("#main_fraim").attr("src", faucet_url);
}
//______________________________________________________________________________

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
			faucet_id	= 0;
			faucet_url="";
			
			alert("All faucets enabled.\n\nClick next button.");
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
			
			alert("Faucet disabled.\n\nClick next button.");
    	},

    	error: function(){
			alert("Internal Error while disabling.");
		}
    });
	
}
//______________________________________________________________________________  hided

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
			faucet_url	= faucet.url;

			$("#id_td").html("id: "+faucet_id);
			$("#main_fraim").attr("src", faucet_url);
			$("#cduraion").val(faucet.duration);
			
			(faucet_id != 0 )
				? $(".hided").show()
				: $(".hided").hide();
    	},

    	error: function(){
			alert("Internal Error while go to next.");
		}
    });
}
