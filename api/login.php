<?php

//=================== KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI RI UNREMARK ========
	include_once "Koneksi.php";

	class usr{}
	
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	
	// $username = 'admin';
	// $password = md5('123456789');

	
	if ((empty($username)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysqli_query($con, "SELECT * FROM tbl_user WHERE username='$username' AND Pass='$password'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['nama_lengkap'];
		$response->id = $row['id_user'];
		$response->name = $row['nama_lengkap'];
		$response->jabatan = $row['Jabatan'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}
	
	mysqli_close($con);


?>

