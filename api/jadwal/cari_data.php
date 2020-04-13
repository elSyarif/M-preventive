<?php 

        include_once "Koneksi.php";

        // $key = '09';
        $key = $_POST['key'];

        $query = mysqli_query($con, "SELECT * FROM jadwal WHERE start LIKE '%".$key."%'");


        $num_rows = mysqli_num_rows($query);

        if ($num_rows > 0){
            $json = '{"value":1, "results": [';

            while ($row = mysqli_fetch_array($query)){
                $char ='"';

                $json .= '{
                    "id": "'.str_replace($char,'`',strip_tags($row['id'])).'",
                    "title": "'.str_replace($char,'`',strip_tags($row['title'])).'",
                    "description": "'.str_replace($char,'`',strip_tags($row['description'])).'",
                    "start": "'.str_replace($char,'`',strip_tags(date("d F Y",strtotime($row['start'])))).'",
                    "end": "'.str_replace($char,'`',strip_tags(date("d F Y",strtotime($row['end'])))).'"
                },';
            }

            $json = substr($json,0,strlen($json)-1);

            $json .= ']}';

        } else {
            $json = '{"value":0, "message": "Data tidak ditemukan."}';
        }

        echo $json;

        mysqli_close($con);
?>