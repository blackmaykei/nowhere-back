<?php

include_once 'DBconfig.php';
include_once 'appendstatus.php';

//Get the variables here
class login extends appendstatus{

	public function loginUser($username, $password){
		session_start();
		$_SESSION["username"]=$username;
		if(isset($_POST['submit']))
		{
			if(empty($username)|| empty($password))
			{
				$error[]= array('status' => 0, "output" => "username or password invalid");
				return $error;
			}
		}
		else{
		$dbconfig = new DBconfig();	
		$conn = $dbconfig -> connectDB();
		//$rows = null;
		if (!$conn) exit();

		$username=mysqli_real_escape_string($conn,$username);
		$password=mysqli_real_escape_string($conn,$password);
		$query = "SELECT count(*) FROM `get_users` WHERE userid='$username' AND pass_word='$password'";

		$result = mysqli_query($conn,$query);
		

		$count = mysqli_fetch_array($result);

		$rows=array(); 

		$r = $this->appendLoginStatus($count);
		$rows = array_merge($r,$rows);
		return $rows;
	}
}
}
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if(empty(strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])) == 'xmlhttprequest') { 
	$login = new login();
	$send = $login -> loginUser($request->username, $request->password );
	echo json_encode($send);
}


?>