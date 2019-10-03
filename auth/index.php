<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jadwal Penggunaan Lab. Komputer - BPSDMD Provinsi Jawa Tengah</title>
<link href='../assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
<link href='../assets/css/bootstrap.min.css' rel='stylesheet'>
<link href='../assets/css/fullcalendar.min.css' rel='stylesheet' />
<link href='../assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<!--<link href='../assets/css/jquery-ui.min.css' rel='stylesheet'>-->

<link href='../assets/css/style.css' rel='stylesheet'>
<script src='../assets/js/jquery.min.js'></script>
<!--<script src="../assets/js/jquery-ui.min.js"></script>-->
<!--<script src="../assets/js/datepicker-id.js"></script>-->
<script src='../assets/js/bootstrap.min.js'></script>
<script src='../assets/js/moment.min.js'></script>
<script src='../assets/js/fullcalendar.min.js'></script>
<script src='../assets/js/lang-all.js'></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src='script.auth.js'></script>
</head>
<body>

<div class="container-fluid">
<div class="row header">
<div class="col-md-1">
<img id="logojateng" src="../assets/img/logo_jawa_tengah_icon.ico" width="72" height="72" alt="">
</div>
<div class="col-md-11" align="left">
<h4><b>Jadwal Penggunaan Lab. Komputer</b></h4><h4>BPSDMD Provinsi Jawa Tengah
    <span class='label label-default' aria-hidden='true'>Admin</span>
</h4>

</div>
</div>
<div class="row content">
<div class="col-sm-1">
    <div id='external-events'>
        <br>
        <hr>
        <center>
        <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#modal-tambah"><span class="glyphicon glyphicon-plus"></span></button>
        </center>
        <hr>
    </div>
</div>
<div class="col-md-11">
    <br>
    <div id='calendar'></div>
    <div id='keterangan'></div><br>
</div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-sm-1" style="text-align: center;">
        <span class="badge" style="background-color: #ff0000;">Sekretariat</span>
    </div>
    <div class="col-sm-1" style="text-align: center;">
        <span class="badge" style="background-color: #2e31e8;">Bidang-1 | SKPM</span>
    </div>
    <div class="col-sm-1" style="text-align: center;">
        <span class="badge" style="background-color: #4ade30;">Bidang-2 | PKT</span>
    </div>
    <div class="col-sm-1" style="text-align: center;">
        <span class="badge" style="background-color: #ffd700;">Bidang-3 | PKJF</span>
    </div>
    <div class="col-sm-1" style="text-align: center;">
        <span class="badge" style="background-color: #9ea4b5;">Bidang-4 | PKM</span>
    </div>
    <div class="col-sm-1" style="text-align: center;">
        <span class="badge" style="background-color: #0c064e;">Lainnya</span>
    </div>
    <div class="col-md-3"></div>
</div>
<br><br>
<footer>
  <div class="row">
  <div class="col-md-10">
    <p><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Jl. Setiabudi No. 201 A Semarang (50263) |
    <span class='glyphicon glyphicon-phone-alt' aria-hidden='true'></span> 024-7473066 |
    <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> <a href="mailto:diklat@jatengprov.go.id?subject=">diklat@jatengprov.go.id</a> |
    <span class='glyphicon glyphicon-globe' aria-hidden='true'></span><a href="http://badandiklat.jatengprov.go.id" target="_blank"> badandiklat.jatengprov.go.id</a></p>
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
                    <a id="link-hapus" href="javascript:;">
                        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>
                    </a>
                    <a id="link-edit" href="javascript:;">
                        <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- modal untuk edit diklat-->
<div id="modal-edit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jadwal</h4>
            </div>
            <div class="modal-body">
                <?php
                    $required="required";
                    $wajib="<span style='color: #FF1414'><b>*</b></span>";
                ?>                
                <form method="POST">
                   <input id="eventid" type="text" name="eventid" value="" hidden="hidden">
                   <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Acara <?= $wajib ?></label>
                                <input class="form-control" id="edit_namakeg" type="text" name="namakeg" value="" required>                            
                            </div>
                        </div>
                   </div>
                   <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Tanggal <?= $wajib ?></label>
                                <input class="form-control" id="edit_tanggal" type="text" name="tanggal" required>
                            </div>
                            <div class="col-sm-3">
                                <label>Pukul <?= $wajib ?></label>
                                <input class="form-control" id="edit_pukul_mulai" type="text" name="pukul" required>
                            </div>
                            <div class="col-sm-3">
                                <label>Sampai pukul</label>
                                <input class="form-control" id="edit_pukul_selesai" type="text" name="pukulselesai" required>
                            </div>                         
                        </div>
                   </div>
                   <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Penanggung jawab <?= $wajib ?></label>
                                <select class="form-control" id="edit_penyelenggara" name="penyelenggara" required>
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="Sekretariat"> Sekretariat </option>
                                    <option value="Bidang-1"> Bidang 1 | SKPM  </option>
                                    <option value="Bidang-2"> Bidang 2 | PKT </option>
                                    <option value="Bidang-3"> Bidang 3 | PKJF </option>
                                    <option value="Bidang-4"> Bidang 4 | PKM </option>
                                    <option value="Lainnya"> Lainnya </option>
                                </select>
                            </div>
                        </div>
                   </div>
                    <br/>
                    <button id="simpan-perubahan" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal untuk tambah diklat-->
<div id="modal-tambah" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah jadwal</h4>
            </div>
            <div class="modal-body">
                <?php
                $required="required";
                $wajib="<span style='color: #FF1414'><b>*</b></span>";
                ?>                
                <form method="post">
               <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Acara <?= $wajib ?></label>
                            <input class="form-control" id="namakeg" type="text" name="namakeg" required>                            
                        </div>
                    </div>
               </div>
               <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Tanggal <?= $wajib ?></label>
                            <input class="form-control" id="tanggal" type="text" name="tanggal" required>
                        </div>
                        <div class="col-sm-3">
                            <label>Pukul <?= $wajib ?></label>
                            <input class="form-control" id="pukul" type="text" name="pukul" required>
                        </div>
                        <div class="col-sm-3">
                            <label>Sampai pukul</label>
                            <input class="form-control" id="pukulselesai" type="text" name="pukulselesai" required>
                        </div>                         
                    </div>
               </div>
               <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Penanggung jawab <?= $wajib ?></label>
                            <select class="form-control" id="penyelenggara" name="penyelenggara" required>
                                <option value="" disabled selected>--Pilih--</option>
                                <option value="Sekretariat"> Sekretariat </option>
                                <option value="Bidang-1"> Bidang 1 | SKPM  </option>
                                <option value="Bidang-2"> Bidang 2 | PKT </option>
                                <option value="Bidang-3"> Bidang 3 | PKJF </option>
                                <option value="Bidang-4"> Bidang 4 | PKM </option>
                                <option value="Lainnya"> Lainnya </option>
                            </select>
                        </div>
                    </div>
               </div>
                <br/>
                <button class="btn btn-primary" id="submit" name="submit"><span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span> Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>