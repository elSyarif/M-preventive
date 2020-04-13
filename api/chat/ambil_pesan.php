<?php 

//Import File Koneksi Database
	require_once('Koneksi.php');

	//Membuat SQL Query
	// $sql = "SELECT * FROM tbl_emergency ORDER BY start DESC";
    $sql = "SELECT * FROM tbl_emergency INNER JOIN  tbl_user ON tbl_user.id_user = tbl_emergency.id_pengirim  ORDER BY time DESC";


	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);

	//Membuat Array Kosong
    $json = array();
	// $format = '2018-09-12';
	while($row = mysqli_fetch_assoc($r)){
		array_push($json,array(
			'id'=> $row['id'],
			'nama_lengkap'=> $row['nama_lengkap'],
            'pesan'=> $row['pesan'],
            'time'=> date('d/m - H:i',strtotime($row['time'])),
			
		));
	}

	//Menampilkan Array dalam Format JSON
	echo json_encode($json);

    mysqli_close($con);

 ?>