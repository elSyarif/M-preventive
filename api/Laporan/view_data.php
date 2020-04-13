<?php 
	include_once('Koneksi.php'); 

	$query = "SELECT * FROM inspeksi";

	$result = mysqli_query($con,$query);

	$arraydata = array();

	while($baris = mysqli_fetch_assoc($result))
	{
		$arraydata[]=$baris;
	}
	echo json_encode($arraydata);
 ?>