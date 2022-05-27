<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dynamic Dependent Select Box</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Dynamic Dependent Select Box in<br> PHP & jQuery Ajax</h1>
		</div>
		<div id="content">
			<form method="">
        <label>Country : </label>
        <select id="country">
        	<option value="" >Select Country</option>
			<h3 id ="cnt_check"></h3>
        </select>
				<br><br>
        <label>State : </label>
        <select id="state">
        	<option value=""selected>Select state</option>
        </select>
        <label>village : </label>
        <select id="village">
        	<option value="">Select village</option>
        </select>
        <label>taluka : </label>
        <select id="taluka">
        	<option value="">Select taluka</option>
        </select>
      </form>
		</div>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){

console.log(type);

  		$.ajax({
  			url : "load-cs.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#state").html(data);
  				}else if(type == "villagedata") {
  					$("#village").html(data);
  				}else if(type == "talukadata"){
					$("#taluka").html(data);
				}
				else{
					$("#country").append(data);  
				}
  				
  			}
  		});

  	}

	  loadData('country_data');
  	

  	$("#country").on("change",function(){
  		var country = $("#country").val();
		
		  
  		if(country != ""){
  			loadData("stateData", country);
  		}
		  
		  else{
  			$("#state").html("");
  		}

  		
  	})
	  $("#state").on("change",function(){
		var stateData = $("#state").val();
		// console.log(stateData);
		if(stateData !=""){
			loadData("villagedata" , stateData)
		}else{
			
		}
	  })	
	  $("#village").on("change",function(){
		var vilagedata = $("#village").val();
		console.log(vilagedata);
		if(vilagedata !=""){
			loadData("talukadata" , vilagedata)
		}else{
			
		}
	  })
	  

  });
  $(document).ready(function() {
            $("#country").keyup(function() {
                checkdata();
            })

            function checkdata() {
                var country_val = $("#country").val();
                console.log(country_val);

                if (country_val == '') {
                    $("#cnt_check").show();
                    $("#cnt_check").html("**plese select country");
                    $("#cnt_check").focus();
                    $("#cnt_check").css("color", "red");

                } else {
                    $("#cnt_check").hide();
                }
            }



        });
</script>
</body>
</html>
