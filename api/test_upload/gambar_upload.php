<?php 
    include_once 'Koneksi.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $DefaultId = 0;
    
        $ImageName  = $_POST['nama_gambar'];
    
        $ImageData = $_POST['gambar'];
   
        $GetOldIdSQL ="SELECT id FROM tbl_gambar ORDER BY id ASC";
    
        $Query = mysqli_query($con,$GetOldIdSQL);
    
             while($row = mysqli_fetch_array($Query)){
    
             $DefaultId = $row['id'];
            }
    
         $ImagePath = "mesin/$DefaultId.png";
    
        $ServerURL = "https://192.168.100.3/M-preventive/upload/$ImagePath";
    
        $InsertSQL = "INSERT INTO tbl_gambar (id,nama_gambar,gambar) values (null,'$ImageName','$ImagePath')";
    
            if(mysqli_query($con, $InsertSQL)){
   
                file_put_contents($ImagePath,base64_decode($ImageData));
   
                echo "Your Image Has Been Uploaded.";
            }
    
            mysqli_close($con);
    }else{
    echo "Not Uploaded";
    }
?>
