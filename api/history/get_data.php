<?php 

	//Import File Koneksi Database
	require_once('Koneksi.php');


	$sql = "SELECT * FROM inspeksi INNER JOIN  mesin ON mesin.ID = inspeksi.id_mesin  ORDER BY tgl_inspeksi DESC";


	$result = mysqli_query($con,$sql);
	$url = "http://192.168.43.131/M-preventive/upload/images/";
	$json = array();
	while($baris = mysqli_fetch_assoc($result))
	{
		array_push($json,array(
			'Id'=> $baris['Id'],
			'id_mesin'=> $baris['id_mesin'],
			'id_user'=> $baris['id_user'],
			'Tgl_inspeksi'=>$baris['Tgl_inspeksi'],
			'Drive_end_OV_H'=> $baris['Drive_end_OV_H'],
			'Drive_end_OV_V'=>$baris['Drive_end_OV_V'],
			'Drive_end_BV_H'=> $baris['Drive_end_BV_H'],
			'Drive_end_BV_V'=> $baris['Drive_end_BV_V'],
			'Temperatur_Drive'=> $baris['Temperatur_Drive'],
			'Non_Drive_end_OV_H'=> $baris['Non_Drive_end_OV_H'],
			'Non_Drive_end_OV_V'=> $baris['Non_Drive_end_OV_V'],
			'Non_Drive_end_BV_H'=> $baris['Non_Drive_end_BV_H'],
			'Non_Drive_end_BV_V'=> $baris['Non_Drive_end_BV_V'],
			'Temperatur_Non_Drive'=> $baris['Temperatur_Non_Drive'],
			'oil_seil'=> $baris['oil_seil'],
			'oil_status'=>$baris['oil_status'],
			'ID'=> $baris['ID'],
			'No_Mesin'=> $baris['No_Mesin'],
			'Nama_Mesin'=> $baris['Nama_Mesin'],
			'Area'=> $baris['Area'],
			'Gambar'=>$url.$baris['Gambar']
		));
	}
	echo json_encode($json); 
 ?>

