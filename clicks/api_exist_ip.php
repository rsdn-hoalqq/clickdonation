<?php
	require_once('classes/Database.php');
	require_once('classes/UserInfo.php'); 	
	session_start();
	$public_ip = UserInfo::get_ip();
	$device = UserInfo::get_device();
	$os = UserInfo::get_os();
	$browser = UserInfo::get_browser();
	if(!empty($_POST) && preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/',$_POST['public_ip'])  && $_POST['cookies_info'])
	{
		$local_ip = $_POST['local_ip'];
		$public_ip =$_POST['public_ip'];
		$date_click = Date('Y-m-d');
		$cookies = $_POST['cookies_info'];
		
		$db = new Database();
		//check click
		if(!empty($local_ip) && preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/',$_POST['local_ip']))
		{
			$sql = "SELECT * FROM clicks WHERE click_date='$date_click' AND public_ip='$public_ip' AND local_ip='$local_ip' AND cookies_info='$cookies' AND os='$os' AND device='$device' ";
			
		}
		else{
			$sql = "SELECT * FROM clicks WHERE click_date='$date_click' AND public_ip='$public_ip' AND cookies_info='$cookies' AND os='$os' AND device='$device' ";
		}
		$check = $db->getOne($sql);
		if($check== false)
		{
			$ret =['code'=>200,'message'=>'click success'];
		}
		else{
			$ret =['code'=>201,'message'=>'You permit click once time per day'];
		}
		
	}
	else{
		$ret = ['code'=>201,'message'=>'Please check param'];
		
	}
	die(json_encode($ret));
	