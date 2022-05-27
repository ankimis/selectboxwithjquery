<?php

include("db_connect.php");
include("select_data.php");




	$str = "";
	switch ($_POST['type']) {
		case "country_data": 	 
							$all_country = getAllCountry($conn);
							for ($i=0; $i < count($all_country) ; $i++) { 
								$str .= "<option value='{$all_country[$i]['cid']}'>{$all_country[$i]['cname']}</option>";
							}
							break;
		case "stateData":
							$all_country = getState($conn,$_POST['id']);
							$str = '<option value="" selected disabled>Select State</option>';
							for ($i=0; $i < count($all_country) ; $i++) { 
								$str .= "<option value='{$all_country[$i]['sid']}'>{$all_country[$i]['sname']}</option>";
							}
							break;
		case "villagedata":
			// print_r($_POST['id']);exit;
							$all_state = getvillage($conn,$_POST['id']);
							$str = '<option value="" selected disabled>Select village</option>';
							for($i=0; $i < count($all_state);$i++){
								$str .= "<option value='{$all_state[$i]['id']}'>{$all_state[$i]['village_name']}</option>";	
							}
							break;
		case "talukadata":
							$all_taluka =gettaluka($conn,$_POST['id']);
							$str = '<option value="" selected disabled>Select State</option>';
							for($i =0; $i< count($all_taluka); $i++){
								$str .= "<option value='{$all_taluka[$i]['id']}'>{$all_taluka[$i]['taluka_name']}</option>";
							}
							break; 
	}
	echo $str;
	?>
