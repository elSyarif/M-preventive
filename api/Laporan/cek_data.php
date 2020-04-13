<?php

	include "Koneksi.php";

	class msin{}
	$Cek_No_Mesin = $_POST['No_Mesin'];
	// $Cek_No_Mesin = 'PU-110211A';

	if (empty($Cek_No_Mesin)) {
		$response = new mesin();
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}

	$sql = mysqli_query($con, "SELECT * FROM mesin WHERE No_Mesin = '$Cek_No_Mesin'");

	$query = mysqli_fetch_array( $sql);

	if (!empty($query)) {
		$response = new msin();
		$response->success = 1;
		$response->message = "Nomor Mesin Benar";
		$response->ID = $query['ID'];
		$response->No_Mesin = $query['No_Mesin'];
		die(json_encode($response));

	}else {
		$response = new msin();
		$response->success = 0;
		$response->message = "ID atau Nomor Mesin Salah";
		die(json_encode($response));
	}
	mysqli_close($con);
?>