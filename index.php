<!DOCTYPE html>
<?php
include "plugins/config.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Penggunaan Lab. Komputer - BPSDMD Provinsi Jawa Tengah</title>
    <link href='assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
    <link href='assets/css/bootstrap.min.css' rel='stylesheet'>
    <link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='assets/css/style.css' rel='stylesheet'>
    <!--<link href='assets/css/jquery-ui.min.css' rel='stylesheet'>-->
    <script src='assets/js/jquery.min.js'></script>
    <script src='assets/js/bootstrap.min.js'></script>
    <script src='assets/js/moment.min.js'></script>
    <script src='assets/js/fullcalendar.min.js'></script>
    <script src='assets/js/lang-all.js'></script>
    <script src='script.js'></script>
</head>
<body>
    <div class="container">

    <div class="row header">
    <div class="col-md-1">
    <img id="logojateng" src="assets/img/logo_jawa_tengah_icon.ico" width="72" height="72" alt="">
    </div>
    <div class="col-md-11" align="left">
    <h4><b>Jadwal Penggunaan Lab. Komputer</b></h4><h4>BPSDMD Provinsi Jawa Tengah</h4>
    </div>
    </div>

    <div class="row content">
        <div class="col-md-12">
            <br>
            <div id='calendar'></div>
        </div>
        <div class="col-md-12">
            <div id='keterangan'></div><br>
        </div>
    </div>

    <div class="row">
        
        <div class="col-sm-2" style="text-align: center;">
            <span class="badge" style="background-color: #ff0000;">Sekretariat</span>
        </div>
        <div class="col-sm-2" style="text-align: center;">
            <span class="badge" style="background-color: #2e31e8;">Bidang-1 | SKPM</span>
        </div>
        <div class="col-sm-2" style="text-align: center;">
            <span class="badge" style="background-color: #4ade30;">Bidang-2 | PKT</span>
        </div>
        <div class="col-sm-2" style="text-align: center;">
            <span class="badge" style="background-color: #ffd700;">Bidang-3 | PKJF</span>
        </div>
        <div class="col-sm-2" style="text-align: center;">
            <span class="badge" style="background-color: #9ea4b5;">Bidang-4 | PKM</span>
        </div>
        <div class="col-sm-2" style="text-align: center;">
            <span class="badge" style="background-color: #0c064e;">Lainnya</span>
        </div>
        
    </div>

    <br><br>

    <footer>
      <div class="row">
      <div class="col-md-10">
        <p><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Jl. Setiabudi No. 201 A Semarang (50263) |
        <span class='glyphicon glyphicon-phone-alt' aria-hidden='true'></span> 024-7473066 |
        <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> <a href="mailto:bpsdmd@jatengprov.go.id?subject=">bpsdmd@jatengprov.go.id</a> |
        <span class='glyphicon glyphicon-globe' aria-hidden='true'></span><a href="http://bpsdmd.jatengprov.go.id" target="_blank"> bpsdmd.jatengprov.go.id</a></p>
      </div>
      <div class="col-md-2">
      </div>
      </div>
    </footer>

    </div>

    <!-- modal untuk view detail diklat-->
    <div id="modal-detail" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Detail jadwal</h4><br>
                    <center><table class="table">
                    <tr>
                        <th>Acara</th><td id="namakegiatan"></td>
                    </tr>
                    <tr>
                        <th>Waktu</th><td id="waktu"></td>
                    </tr>
<!--                    <tr>
                        <th>Waktu selesai</th><td id="detailselesai"></td>
                    </tr>                     -->
<!--                    <tr>
                        <th>Tempat</th><td id="detailkampus"></td>
                    </tr>                    -->
                    <tr>
                        <th>Penanggung jawab</th><td id="penanggungjawab"></td>
                    </tr>
<!--                    <tr>
                        <th>Keterangan</th><td id="ket"></td>
                    </tr>-->
                    </table></center>
                </div>
            </div>
        </div>
    </div>

</body>
</html>