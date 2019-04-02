<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$db = new Connection();
	$respone_pembayaran = array("error" => false);

	$nama_pelanggan = $_POST['nama_pelanggan'];
	$nama_barang = $_POST['nama_barang'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$total_penjualan = $_POST['total_penjualan'];

	$pembayaran = $db->InsertTotalPembelian($nama_pelanggan, $nama_barang, $harga, $jumlah, $total_penjualan);

	if ($pembayaran) 
	{
		$respone["error"] = false;
		$respone["message"] = "Pembayaran Succes";
		echo json_encode($respone);
	} else {
		$respone["error"] = true;
		$respone["message"] = "Pembayaran gagal";
		echo json_encode($respone);
	}
}
?>