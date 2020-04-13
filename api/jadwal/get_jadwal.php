<?php 

//Import File Koneksi Database
	require_once('Koneksi.php');

	//Membuat SQL Query
	$sql = "SELECT * FROM jadwal ORDER BY start DESC";

	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);

	//Membuat Array Kosong
	$json = array();
	$format = '2018-09-12';
	while($row = mysqli_fetch_assoc($r)){
		array_push($json,array(
			'id'=> $row['id'],
			'title'=> $row['title'],
			'description'=> $row['description'],
			'color'=> $row['color'],
			'start'=> date("d F Y",strtotime($row['start'])),
			'end'=> date("d F Y",strtotime($row['end']))
		));
	}

	//Menampilkan Array dalam Format JSON
	echo json_encode($json);

	mysqli_close($con);
 ?>