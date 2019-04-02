<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$db = new Connection();
	$respone_barang = array("error" => false);

	$email = $_POST['email'];

	$barang = $db->DeleteBarang($kode_barang);

	if ($barang) 
	{
		$respone["error"] = false;
		$respone["message"] = "Delete barang berhasil";
		echo json_encode($respone);
	} else {
		$respone["error"] = true;
		$respone["message"] = "Delete barang gagal";
		echo json_encode($respone);
	}
} else {
	$respone["error"] = true;
	$respone["message"] = "connection loss";
	echo json_encode($respone);
}
?>