<?php 

//Import File Koneksi Database
	require_once('Koneksi.php');

	//Membuat SQL Query
	$sql = "SELECT * FROM mesin";

	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	$url = "http://192.168.43.131/M-preventive/upload/images/";
	//Membuat Array Kosong
	$json = array();
	while($row = mysqli_fetch_assoc($r)){
		// $json[] =$row;
		array_push($json,array(
			'ID'=>$row['ID'],
			'No_Mesin'=>$row['No_Mesin'],
			'Nama_Mesin'=>$row['Nama_Mesin'],
			'Area'=>$row['Area'],
			'Gambar'=>$url.$row['Gambar'],

		));
			
	}

	//Menampilkan Array dalam Format JSON
	echo json_encode($json);

	mysqli_close($con);
 ?>