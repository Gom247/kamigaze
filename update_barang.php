<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$db = new Connection();
	$respone_barang = array("error" => false);

	$kode_barang = $_POST['kode_barang'];
	$nama_barang = $_POST['nama_barang'];
	$jenis_barang = $_POST['jenis_barang'];
	$produk_barang = $_POST['produk_barang'];
	$harga_barang = $_POST['harga_barang'];

	$barang = $db->UpdateBarang($kode_barang, $nama_barang, $jenis_barang, $produk_barang, $harga_barang);

	if ($barang) 
	{
		$respone["error"] = false;
		$respone["message"] = "Update barang barhasil";
		echo json_encode($respone);

	} else {

		$respone["error"] = true;
		$respone["message"] = "Update barang gagal";
		echo json_encode($respone);
	}
	
} else {

	$respone["error"] = true;
	$respone["message"] = "connection loss";
	echo json_encode($respone);
}
?>