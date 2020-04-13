<?php
    include"Koneksi.php";

    $id_user    = $_POST['id_pengirim'];
    $isi_pesan  = $_POST['pesan'];
    
    class emp{}
    if(empty($isi_pesan)){
        $response =  new emp();
        $response->success =0;
        $response->message = "Failed";
        die(json_decode($response));
     }else{
        $insert = "INSERT INTO `tbl_emergency`(`id`, `id_pengirim`, `pesan`, `time`) 
        VALUES (null,'$id_user','$isi_pesan',null)";
      
        $exeinsert = mysqli_query($con,$insert);

        if($exeinsert)
        {
            $response = new emp();
			$response->success = 1;
			$response->message = "Success! Data berhasil di simpan";
			die(json_encode($response));
        }
        else
        {
            $response = new emp();
			$response->success = 0;
			$response->message = "Error";
			die(json_encode($response)); 
        }
    }
?>