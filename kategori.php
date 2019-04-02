<?php 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$db = new Connection();
	$respone_kategori = array();
	$kategori = $db->Kategori();

	if ($kategori) 
	{
		foreach ($kategori as $row) 
		{
			array_push($respone_kategori, array('kategori' => $row[1]));
		}
	}

	echo ($kategori)?
	json_encode(array("error" => 1, "respone_kategori" => $respone_kategori)):
	json_encode(array("error" => 2, "respone_kategori" => "Gagal memunculkan kategori"));
}
?>