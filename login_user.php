<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$db = new Connection();
	$respone_user = array("error" => false);
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$user = $db->LoginUser($email, $password);
	
	if ($user) 
	{
		$respone["error"] = false;
		$respone["message"] = " Welcome " .$email;
		echo json_encode($respone);

	} else {

		$respone["error"] = true;
		$respone["message"] = "Login Gagal";
		echo json_encode($respone);
	}

} else {

	$respone["error"] = true;
	$respone["message"] = "connection loss";
	echo json_encode($respone);
}
?>