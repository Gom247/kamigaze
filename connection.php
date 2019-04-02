<?php 


class Connection
{
	
	function __construct()
	{
		$this->connect = new PDO('mysql:host=localhost;dbname=sentro_gundam', "root", "");
	}

	public function LoginUser($email, $password)
	{
		$encript = md5($password);

		$sql = "SELECT * FROM user WHERE email = :email AND password = :password";
		$data = $this->connect->prepare($sql);
		$data->bindParam(":email", $email);
		$data->bindParam(":password", $encript);
		$data->execute();
		$user = $data->fetch();

		return $user;
	}

	public function InsertUser($email, $password, $nama, $alamat, $notlp)
	{
		$encript = md5($password);

		$sql = "INSERT INTO user (email, password, nama, alamat, notlp) VALUES (:email, :password, :nama, :alamat, :notlp)";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':email', $email);
		$data->bindParam(':password', $encript);
		$data->bindParam(':nama', $nama);
		$data->bindParam(':alamat', $alamat);
		$data->bindParam(':notlp', $notlp);
		$user = $data->execute();

		return $user;
	}

	public function CekEmail($email)
	{
		$sql = "SELECT email FROM user WHERE email = :email";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':email', $email);
		$data->execute();
        $data->fetch();
 
        if ($data->rowCount() > 0) {
            // user telah ada 
            $data = null;
            return true;
        } else {
            // user belum ada 
            $data = null;
            return false;
        }
	}

	public function UpdateUser($email, $nama, $alamat, $notlp)
	{
		$sql = "UPDATE user SET email = :email, nama = :nama, alamat = :alamat, notlp = :notlp WHERE email = :email";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':email', $email);
		$data->bindParam(':nama', $nama);
		$data->bindParam(':alamat', $alamat);
		$data->bindParam(':notlp', $notlp);
		$user = $data->execute();

		return $user;
	}

	public function DeleteUser($email)
	{
		$sql = "DELETE FROM user WHERE email = :email";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':email', $email);
		$user = $data->execute();

		return $user;
	}

	public function LihatUser($email)
	{
		$sql = "SELECT * FROM user WHERE email = :email";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':email', $email);
		$data->execute();
		$user = $data->fetch();

		return $user;
	}

	public function InsertBarang($kode_barang, $nama_barang, $jenis_barang, $produk_barang, $harga_barang)
	{
		$sql = "INSERT INTO barang(kode_barang, nama_barang, jenis_barang, produk_barang, harga_barang) VALUES (:kode_barang, :nama_barang, :jenis_barang, :produk_barang, :harga_barang)";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':kode_barang', $kode_barang);
		$data->bindParam(':nama_barang', $nama_barang);
		$data->bindParam(':jenis_barang', $jenis_barang);
		$data->bindParam(':produk_barang', $produk_barang);
		$data->bindParam(':harga_barang', $harga_barang);
		$barang = $data->execute();

		return $barang;

	}

	public function CekKodeBarang($kode_barang)
	{
		$sql = "SELECT kode_barang FROM barang WHERE kode_barang = :kode_barang";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':kode_barang', $kode_barang);
		$data->execute();
        $data->fetch();
 
        if ($data->rowCount() > 0) {
            // user telah ada 
            $data = null;
            return true;
        } else {
            // user belum ada 
            $data = null;
            return false;
        }
	}

	public function UpdateBarang($kode_barang, $nama_barang, $jenis_barang, $produk_barang, $harga_barang)
	{
		$sql = "UPDATE barang SET kode_barang = :kode_barang, nama_barang = :nama_barang, jenis_barang = :jenis_barang, produk_barang = :produk_barang, harga_barang = :harga_barang WHERE kode_barang = :kode_barang";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':kode_barang', $kode_barang);
		$data->bindParam(':nama_barang', $nama_barang);
		$data->bindParam(':jenis_barang', $jenis_barang);
		$data->bindParam(':produk_barang', $produk_barang);
		$data->bindParam(':harga_barang', $harga_barang);
		$barang = $data->execute();

		return $barang;
	}

	public function CekBarang()
	{
		$sql = "SELECT * FROM barang";
		$data = $this->connect->prepare($sql);
		$data->execute();
		$barang = $data->fetchAll();

		return $barang;
	}

	public function DeleteBarang($kode_barang)
	{
		$sql = "DELETE FROM barang WHERE kode_barang = :kode_barang";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':kode_barang', $kode_barang);
		$barang = $data->execute();

		return $barang;
	}

	public function Kategori()
	{
		$sql = "SELECT * FROM kategori";
		$data = $this->connect->prepare($sql);
		$data->execute();
		$kategori = $data->fetchAll();

		return $kategori;
	}

	public function JenisBarang($jenis_barang)
	{
		$sql = "SELECT * FROM barang WHERE jenis_barang = :jenis_barang";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':jenis_barang', $jenis_barang);
		$data->execute();
		$barang = $data->fetchAll();

		return $barang;
	}

	public function InsertTotalPembelian($nama_pelanggan, $nama_barang, $harga, $jumlah, $total_penjualan)
	{
		$sql = "INSERT INTO total (nama_pelanggan, nama_barang, harga, jumlah, total_penjualan) VALUES (:nama_pelanggan, :nama_barang, :harga, :jumlah, :total_penjualan)";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':nama_pelanggan', $nama_pelanggan);
		$data->bindParam('nama_barang', $nama_barang);
		$data->bindParam(':harga', $harga);
		$data->bindParam(':jumlah', $jumlah);
		$data->bindParam(':total_penjualan', $total_penjualan);
		$barang = $data->execute();

		return $barang;
	}

	public function CekTotalPembelian($nama_pelanggan) 
	{
		$sql = "SELECT * FROM total WHERE nama_pelanggan = :nama_pelanggan";
		$data = $this->connect->prepare($sql);
		$data->bindParam(':nama_pelanggan', $nama_pelanggan);
		$data->execute();
		$total = $data->fetchAll();

		return $total;
	}

	public function SearchBarang($search)
	{
		$sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$search = :search%' ORDER BY nama_barang ASC ";
		$data = $this->connect->prepare($sql);
		$data->execute();
		$cari = $data->fetchAll();

		return $cari;
	}
	
}

?>