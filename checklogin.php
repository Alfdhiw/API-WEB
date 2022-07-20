<?php
require_once 'connection.php';

if ($con) {
    $kd_brg = $_POST['kode_brg'];
    $nm_brg = $_POST['nama_brg'];

    $query = "SELECT * from barang where kd_brg = '$kd_brg' AND nm_brg = '$nm_brg'";
    $result = mysqli_query($con, $query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
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

echo json_encode(array("server_response" => $response));
mysqli_close($con);
