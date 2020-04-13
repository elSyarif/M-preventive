<?php 

	include_once"Koneksi.php";
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$id_mesin 				= $_POST['id_mesin'];
		$id_user 				= $_POST['id_user'];
		$Tgl_inspeksi 			= $_POST['tgl_inspeksi'];
		$Drive_end_OV_H			= $_POST['drive_end_OV_H'];
		$Drive_end_OV_V			= $_POST['drive_end_OV_V'];
		$Drive_end_BV_H 		= $_POST['drive_end_BV_H'];
		$Drive_end_BV_V 		= $_POST['drive_end_BV_V'];
		$Temperatur_Drive 		= $_POST['temperatur_Drive'];
		$Non_Drive_end_OV_H		= $_POST['non_drive_end_OV_H'];
		$Non_Drive_end_OV_V		= $_POST['non_drive_end_OV_V'];
		$Non_Drive_end_BV_H		= $_POST['non_drive_end_BV_H'];
		$Non_Drive_end_BV_V		= $_POST['non_drive_end_BV_V'];
		$Temperatur_Non_Drive	= $_POST['temperatur_Non_Drive'];
		$oil_image				= $_POST['oil_seil'];
		$oil_Status				= $_POST['oil_status'];

		$random = random_word(20);
		
		$path = "images/".$random.".png";
		
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://192.168.100.3/M-preventive/api/Laporan/$path";
		
		$query = mysqli_query($con, "INSERT INTO `inspeksi`(`Id`, `id_mesin`, `id_user`, `Tgl_inspeksi`, `Drive_end_OV_H`, `Drive_end_OV_V`, `Drive_end_BV_H`, `Drive_end_BV_V`, `Temperatur_Drive`, `Non_Drive_end_OV_H`, `Non_Drive_end_OV_V`, `Non_Drive_end_BV_H`, `Non_Drive_end_BV_V`, `Temperatur_Non_Drive`,`oil_seil`,`oil_status`) VALUES(null,'$id_mesin','$id_user','$Tgl_inspeksi','$Drive_end_OV_H','$Drive_end_OV_V','$Drive_end_BV_H','$Drive_end_BV_V','$Temperatur_Drive','$Non_Drive_end_OV_H','$Non_Drive_end_OV_V','$Non_Drive_end_BV_H','$Non_Drive_end_BV_V','$Temperatur_Non_Drive','$actualpath','$oil_Status')");
		
		if ($query){
			file_put_contents($path,base64_decode($oil_image));
			
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			
			$response->success = 0;
			$response->message = "Failed! Data Gagal di tambahkan";
			die(json_encode($response)); 
		}
	}
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}
	mysqli_close($con);

?>