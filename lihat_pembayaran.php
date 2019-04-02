<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$db = new Connection();
	$respone_pembayaran = array();

	$nama_pelanggan = $_POST['nama_pelanggan'];

	$pembayaran = $db->CekTotalPembelian($nama_pelanggan);

	if ($pembayaran) 
	{
	 	foreach ($pembayaran as $row) 
	 	{
	 		array_push($respone_pembayaran, array('nama_pelanggan' => $row[1], 'nama_barang' => $row[2], 'harga' => $row[3], 'jumlah' => $row[4], 'total_penjualan' => $row[5]));
	 	}
	 }

	 echo ($pembayaran)?
	 json_encode(array("error" => 1, "respone_pembayaran" => $respone_pembayaran)):
	 json_encode(array("error" => 2, "respone_pembayaran" => "Gagal mengecek")); 
}
?>