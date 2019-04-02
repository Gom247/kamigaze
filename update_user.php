<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$db = new Connection();
	$respone_user = array("error" => false);

	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];

	$user = $db->UpdateUser($email, $nama, $alamat, $notlp);

	if ($user) 
	{
		$respone["error"] = false;
		$respone["message"] = "Update data user berhasil";
		echo json_encode($respone);

	} else {

		$respone["error"] = true;
		$respone["message"] = "Update data user gagal";
		echo json_encode($respone);

	}

} else {

	$respone["error"] = false;
	$respone["message"] = "connection loss";
	echo json_encode($respone);
}
?>