<?php
require_once 'connection.php';

if ($con) {
    $kd_brg = $_POST['kode_brg'];
    $nm_brg = $_POST['nama_brg'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $harga_bl = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $stok_min = $_POST['stok_min'];


    $insert = "INSERT INTO barang(kd_brg,nm_brg,satuan,harga,harga_beli,stok,stok_min)VALUES('$kd_brg','$nm_brg','$satuan','$harga','$harga_bl','$stok','$stok_min')";

    if ($kd_brg != "" && $nm_brg != "" && $satuan != "" && $harga != ""  && $harga_bl != "" && $stok != "" && $stok_min != "") {
        $result = mysqli_query($con, $insert);
        $response = array();

        if ($result) {
            array_push($response, array(
                'status' => 'OK'
            ));
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }
} else {
    array_push($response, array(
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);
