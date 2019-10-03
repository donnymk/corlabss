<?php
    include('../plugins/config.php');

    $eventid = $_POST['eventid'];
    $namakeg = $_POST['edit_namakeg'];
    $tanggal = $_POST['edit_tanggal'];
    $pukul = $_POST['edit_pukul'];
    $pukulselesai = $_POST['edit_pukulselesai'];
    $penyelenggara = $_POST['edit_penyelenggara'];

    var_dump(expression)

    $waktu = $tanggal.'T'.$pukul.':00';
    $waktuselesai = $tanggal.'T'.$pukulselesai.':00';
    $query = "UPDATE jadwal SET acara='". $namakeg ."',start='". $waktu."',end='".$waktuselesai."',penanggungjwb='".$penyelenggara ."' WHERE id='".$eventid."'";
    $insert = mysqli_query($con,$query);

    if($insert)
    {
        header('Location:index.php');
    }
    else
    {
        echo mysqli_error($con);
    }

    //echo $query;
?>