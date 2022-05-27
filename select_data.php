<?php
function getAllCountry($conn){
			$country = array();
			$sql = "SELECT * FROM country_tb";
			$query = pg_query($conn, $sql) or die("Query Unsuccessful."); 
			$country = pg_fetch_all($query);
			return $country;
	}

	function getState($conn,$country_id=0){
			$states = array();
			if($country_id==0){
				$sql = "SELECT * FROM state_tb";
			}else{
				$sql = "SELECT * FROM public.state_tb WHERE country ='" . $country_id . "'";
			}
			$query = pg_query($conn, $sql) or die("Query Unsuccessful."); 
			$states = pg_fetch_all($query);
			return $states;
	}
	function getvillage($conn,$state_id=0){
			$village = array();
			if($state_id==0){
				$sql = "SELECT * FROM state_tb";
			}else{
				$sql = "SELECT * FROM public.village_tb WHERE state_id ='" . $state_id . "'";
			}
			$query = pg_query($conn, $sql) or die("Query Unsuccessful."); 
			$village = pg_fetch_all($query);
			// print_r($village);exit;
			return $village;
	}
	function gettaluka($conn,$village_id=0){
			$taluka = array();
			if($village_id==0){
				$sql = "SELECT * FROM state_tb";
			}else{
				$sql = "SELECT * FROM public.taluka_tb WHERE village_id ='" . $village_id . "'";
			}
			$query = pg_query($conn, $sql) or die("Query Unsuccessful."); 
			$taluka = pg_fetch_all($query);
			// print_r($taluka);exit;
			return $taluka;
	}
    ?>