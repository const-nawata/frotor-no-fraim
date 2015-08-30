/**
 *        
 */

var faucet_id=0
	,faucet_url=""
;

function showInfo(){  

	$.ajax({
		method:"post",
		dataType: "json",
		url: "info.php",

		success: function(info){		
			
			if(info.error.code!=0){
				alert(info.error.message);
				return;
			}
			
			$("#n_all_span").html(info.n_all);
			$("#n_active_span").html(info.n_act);
			
			
			(info.n_act != 0 )
				? $(".hided").show()
				: $(".hided").hide();
			
    	},

    	error: function(){
			alert("Internal Error while show info.");
		}
    });
	
}
//______________________________________________________________________________

function refresh(){
	showInfo();

	$("#main_fraim").attr("src", faucet_url);
}
//______________________________________________________________________________

function enableAll(){

	$.ajax({
		method:"post",
		dataType: "json",
		url: "enable_all.php",

		success: function(faucet){
			if(faucet.error.code!=0){
				alert(faucet.error.message);
				return;
			}

			showInfo();
			alert("All faucets enabled.");
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
			
			alert("Faucet disabled.");
			
			faucet_id	= 0;
			faucet_url="";
			getNextFaucet();
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
		data:{
			"prev_faucet_id":faucet_id,
			"cduratin":$("#cduraion").val(),
			"oduratin":$("#oduraion").val()
		},

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
			$("#oduraion").val(faucet.duration);
			
			showInfo();
    	},

    	error: function(){
			alert("Internal Error while go to next.");
		}
    });
}
