<?php 

	//Import File Koneksi Database
	require_once('Koneksi.php');

	$param = $_GET['id_mesin'];


	$sql = "SELECT * FROM inspeksi INNER JOIN  mesin ON mesin.ID = inspeksi.id_mesin JOIN tbl_user ON tbl_user.id_user = inspeksi.id_user WHERE id_mesin=$param";


	$result = mysqli_query($con,$sql);
	$arraydata = array();
	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}
	echo json_encode($arraydata); 
 ?>

