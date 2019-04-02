<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$db = new Connection();
	$respone_barang = array();
	$barang = $db->CekBarang();

	if ($barang) 
	{
		foreach ($barang as $row) 
		{
			array_push($respone_barang, array('kode_barang' => $row[1], 'nama_barang' => $row[2], 'jenis_barang' => $row[3], 'produk_barang' => $row[4], 'harga_barang' => $row[5]));
		}
	}

	echo ($barang)?
	json_encode(array("error" => 1, "respone_barang" => $respone_barang)):
	json_encode(array("error" => 2, "respone_barang" => "Gagal cek barang"));
}
?>