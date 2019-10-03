<?php
include('../plugins/config.php');

$type = $_POST['type'];

if($type == 'fetch'){
    $events = array();
    $query = mysqli_query($con, "SELECT *, DATE_FORMAT(start, '%d') AS tanggalmulai, DATE_FORMAT(start, '%m') AS bulanmulai, DATE_FORMAT(start, '%Y') AS tahunmulai, DATE_FORMAT(end, '%d') AS tanggaltutup, DATE_FORMAT(end, '%m') AS bulantutup, DATE_FORMAT(end, '%Y') AS tahuntutup FROM jadwal");    
    while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC)){
	$e = array();
        $e['id'] = $fetch['id'];
        $e['title'] = $fetch['acara'];
        $e['start'] = $fetch['start'];
        $e['end'] = $fetch['end'];
        $e['pukulmulai'] = substr($e['start'],11,5);
        $e['pukulselesai'] = substr($e['end'],11,5);
//        $e['tempat'] = $fetch['tempat'];
        $e['penanggungjawab'] = $fetch['penanggungjwb'];
//        $e['keterangan'] = $fetch['keterangan'];
        $e['tanggalmulai'] = $fetch['tanggalmulai'];
//        $e['tanggaltutup'] = $fetch['tanggaltutup'];
        $e['bulanmulai'] = $fetch['bulanmulai'];
//        $e['bulantutup'] = $fetch['bulantutup'];

        if ($e['penanggungjawab'] == "Sekretariat") 
        {
            $e['color'] = '#ff0000';
        }
        elseif ($e['penanggungjawab'] == "Bidang-1") 
        {
            $e['color'] = '#2e31e8';
        }
        elseif ($e['penanggungjawab'] == "Bidang-2") 
        {
            $e['color'] = '#4ade30';
        }
        elseif ($e['penanggungjawab'] == "Bidang-3") 
        {
            $e['color'] = '#ffd700';
        }
        elseif ($e['penanggungjawab'] == "Bidang-4") 
        {
            $e['color'] = '#9ea4b5';
        }
        elseif ($e['penanggungjawab'] == "Lainnya") 
        {
            $e['color'] = '#0c064e';
        }

        //$e['color'] = '#ff0000';
        $e['url'] = 'javascript:;';

        $e['tanggal'] = $fetch['tahunmulai']."-".$fetch['bulanmulai']."-".$fetch['tanggalmulai'];

        switch($e['bulanmulai']) {
            case '01': $e['bulanmulai']='Januari'; break;
            case '02': $e['bulanmulai']='Februari'; break;
            case '03': $e['bulanmulai']='Maret'; break;
            case '04': $e['bulanmulai']='April'; break;
            case '05': $e['bulanmulai']='Mei'; break;
            case '06': $e['bulanmulai']='Juni'; break;
            case '07': $e['bulanmulai']='Juli'; break;
            case '08': $e['bulanmulai']='Agustus'; break;
            case '09': $e['bulanmulai']='September'; break;
            case '10': $e['bulanmulai']='Oktober'; break;
            case '11': $e['bulanmulai']='November'; break;
            case '12': $e['bulanmulai']='Desember'; break;
            default	: $e['bulanmulai']=''; break;
        }


        $e['mulai'] = $e['tanggalmulai'].' '.$e['bulanmulai'].' '.$fetch['tahunmulai'];
//        $e['selesai'] = $e['tanggaltutup'].' '.$e['bulantutup'].' '.$fetch['tahuntutup'];

        //$allday = ($fetch['allDay'] == "true") ? true : false;
        //$e['allDay'] = $allday;

        array_push($events, $e);
    }
    echo json_encode($events);
}

if($type == 'new')
{
    $namakeg = $_POST['namakeg'];
    $tanggal = $_POST['tanggal'];
    $pukul = $_POST['pukul'];
    $pukulselesai = $_POST['pukulselesai'];
    $penyelenggara = $_POST['penyelenggara'];

    $waktu = $tanggal.'T'.$pukul.':00';
    $waktuselesai = $tanggal.'T'.$pukulselesai.':00';
    $insert = mysqli_query($con,"INSERT INTO jadwal(`acara`, `start`, `end`, `penanggungjwb`) VALUES('$namakeg','$waktu','$waktuselesai','$penyelenggara')");
    if($insert)
    {
        echo 'success';
    }
    else
    {
        echo mysql_error($con);
    }
}


if($type == 'remove')
{
    $eventid = $_POST['eventid'];
    $delete = mysqli_query($con,"DELETE FROM jadwal where id='$eventid'");
    if($delete)
        echo json_encode(array('status'=>'success'));
    else
        echo json_encode(array('status'=>'failed'));
}

if($type == 'ganti')
{
    $eventid = $_POST['eventid'];
    $namakeg = $_POST['namakeg'];
    $tanggal = $_POST['tanggal'];
    $pukul = $_POST['pukul'];
    $pukulselesai = $_POST['pukulselesai'];
    $penyelenggara = $_POST['penyelenggara'];

    $waktu = $tanggal.'T'.$pukul.':00';
    $waktuselesai = $tanggal.'T'.$pukulselesai.':00';
    $insert = mysqli_query($con,"UPDATE jadwal SET "."acara='". $namakeg ."',start='". $waktu."',end='".$waktuselesai."',penanggungjwb='".$penyelenggara ."' WHERE id=".$eventid."");

    if($insert)
    {
        echo 'success_edit';
    }
    else
    {
        echo mysqli_error($con);
    }
}

?>