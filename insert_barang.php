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

	if ($db->CekKodeBarang($kode_barang)) 
	{
		$respone["error"] = true;
		$respone["message"] = "Kode barang sudah digunakan " .$kode_barang;
		echo json_encode($respone);
	} else {

		$user = $db->InsertBarang($kode_barang, $nama_barang, $jenis_barang, $produk_barang, $harga_barang);

		if ($user) 
		{
			$respone["error"] = false;
			$respone["message"] = "Input data barang berhasil " .$kode_barang;
			echo json_encode($respone);
		} else {
			$respone["error"] = true;
			$respone["message"] = "Input data barang gagal";
			echo json_encode($respone);
		}
	}
} else {
	$respone["error"] = true;
	$respone["message"] = "connection loss";
	echo json_encode($respone);
}

?>