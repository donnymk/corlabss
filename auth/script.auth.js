$(document).ready(function() {
    $.ajax({
	url: 'process.php',
        type: 'POST', // Send post data
        data: 'type=fetch',
        async: false,
        success: function(s){
            json_events = s;
        }
    });

    var currentMousePos = {
        x: -1,
        y: -1
    };
    jQuery(document).on("mousemove", function (event) {
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
    });

        /* initialize the calendar
		-----------------------------------------------------------------*/
	$('#calendar').fullCalendar({
            header: {
                left: 'prev title next today',
                center: '',
                right: 'agendaDay,agendaWeek,month'
            },
            lang: 'id',
            height: 'auto',
            //theme: true,
            defaultView: 'month',
            //defaultDate: '2016-06-12',
            businessHours: true, // display business hours
            editable: true,
            eventDurationEditable: false,
            minTime: '07:00:00',
            maxTime: '18:00:00',            
            businessHours: false,
            //utc: true,
            events: JSON.parse(json_events),
            eventDragStop: function (event, jsEvent, ui, view) {
                if (isElemOverDiv()) {
                    var con = confirm('Apakah Anda yakin ingin menghapus acara ini?');
                    if(con == true) {
                        $.ajax({
                            url: 'process.php',
                            data: 'type=remove&eventid='+event.id,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response){
                                console.log(response);
                                if(response.status == 'success'){
                                    $('#calendar').fullCalendar('removeEvents');
                                    getFreshEvents();
                                }
                            },
                            error: function(e){
                                alert('Error processing your request: '+e.responseText);
                            }
                        });
                    }
                }
            },
            eventClick: function(event, jsEvent, view) {
                $('#namakegiatan').html(event.title);
                $('#waktu').html(event.mulai + ' ' + event.pukulmulai + ' - ' + event.pukulselesai);
                $('#penanggungjawab').html(event.penanggungjawab);

                //data edit jadwal
                $('#eventid').val(event.id);
                $('#edit_namakeg').val(event.title);
                $('#edit_tanggal').val(event.tanggal);
                $('#edit_pukul_mulai').val(event.pukulmulai);
                $('#edit_pukul_selesai').val(event.pukulselesai);
                
                var penanggungjawab = event.penanggungjawab;

                if (penanggungjawab === "Sekretariat") 
                {
                    $('#edit_penyelenggara').val("Sekretariat");
                }
                else if ( penanggungjawab === "Bidang-1") 
                {
                    $('#edit_penyelenggara').val("Bidang-1");
                }
                else if (penanggungjawab === "Bidang-2") 
                {
                    $('#edit_penyelenggara').val("Bidang-2");
                }
                else if (penanggungjawab === "Bidang-3") 
                {
                    $('#edit_penyelenggara').val("Bidang-3");
                }
                else if (penanggungjawab === "Bidang-4") 
                {
                    $('#edit_penyelenggara').val("Bidang-4");
                }

                $('#modal-detail').modal('show'); //buka modal detail

                $('#link-hapus').click(function()
                {
                    var con = confirm('Apakah Anda yakin ingin menghapus acara ini?');
                    if(con == true) {
                        $.ajax({
                            url: 'process.php',
                            data: 'type=remove&eventid='+event.id,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response){
                                console.log(response);
                                if(response.status == 'success'){
                                    $('#calendar').fullCalendar('removeEvents');
                                    getFreshEvents();
                                    $('#modal-detail').modal('hide'); //tutup modal detail
                                }
                            },
                            error: function(e){
                                alert('Error processing your request: '+e.responseText);
                            }
                        });
                    }        
                });

                $('#link-edit').click(function()
                {
                    $('#modal-detail').modal('hide'); //tutup modal detail
                    $('#modal-edit').modal('show'); //buka modal edit   
                });                
            }
        });

    function getFreshEvents(){
        $.ajax({
            url: 'process.php',
            type: 'POST', // Send post data
            data: 'type=fetch',
            async: false,
            success: function(s){
                    freshevents = s;
            }
        });
        $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
    }

    function isElemOverDiv() {
        var trashEl = jQuery('#trash');

        var ofs = trashEl.offset();

        var x1 = ofs.left;
        var x2 = ofs.left + trashEl.outerWidth(true);
        var y1 = ofs.top;
        var y2 = ofs.top + trashEl.outerHeight(true);

        if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
            currentMousePos.y >= y1 && currentMousePos.y <= y2) {
            return true;
        }
        return false;
    }
    
    //script datetime picker form tambah
    $('#tanggal').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'id'
    });
    $('#pukul').datetimepicker({
        format: 'HH:mm'
    });
    $('#pukulselesai').datetimepicker({
        format: 'HH:mm'
    });

    //script datetime picker form edit
    $('#edit_tanggal').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'id'
    });
    $('#edit_pukul_mulai').datetimepicker({
        format: 'HH:mm'
    });
    $('#edit_pukul_selesai').datetimepicker({
        format: 'HH:mm'
    });

//    $('#btn-edit').click(function(){
//        var dataEdit='type=changetitle&editid='+$('#editid').val()+'&editnamadiklat='+$('#editnamadiklat').val()+'&editjmlpeserta='+$('#editjmlpeserta').val()+'&editkampus='+$('#editkampus').val()+'&editmulai='+$('#editmulai').val()+'&edittutup='+$('#edittutup').val();
//        $.ajax({
//            type: "post",
//            url: "process.php",
//            data: dataEdit,
//            //dataType: 'json',
//            //cache:false,
//            success: function(pesan){
//                if(pesan=='success'){
//                    $('#modal-tambah').modal('hide'); //tutup modal dialog
//                    $('#modal-edit').modal('hide');
//                    window.location="./";
//        		}
//			    /*else{
//				    //Cetak peringatan untuk username & password salah
//				    $('#msg').html(pesan);
//			    }*/
//            }
//        });
//    });

    $('#submit').click(function(){
        var namakeg=document.getElementById('namakeg').value;
        var tanggal=document.getElementById('tanggal').value;
        var pukul=document.getElementById('pukul').value;
        var pukulselesai=document.getElementById('pukulselesai').value;
        var penyelenggara=document.getElementById('penyelenggara').value;
        var dataString='type=new&namakeg='+namakeg+'&tanggal='+tanggal+'&pukul='+pukul+'&pukulselesai='+pukulselesai+'&penyelenggara='+penyelenggara;
        if (namakeg==""){
            $('#namakeg').focus();
        }
    	else if (tanggal==""){
    	    $('#tanggal').focus();
        }
        else if (pukul==""){
            $('#pukul').focus();
        }
        else if (pukulselesai==""){
            $('#pukulselesai').focus();
        }
        else if (penyelenggara==""){
            $('#penyelenggara').focus();
        }
        else{
        
        //Ubah tulisan pada button saat click Simpan
	    $('#submit').html('Menyimpan...');
            $.ajax({
                type:"post",
                url: "process.php",
                data:dataString,
                //dataType: 'json',
                //cache:false,
                success: function(pesan){
                    if(pesan=='success'){
                        $('#modal-tambah').modal('hide'); //tutup modal dialog
                        window.location="./";
            		}
    			    else{
    				    //Cetak peringatan
                        console.log(pesan);
    			    }
                }
            });
            return false;
        }
    });

    //Submit data hasil perubahan
    $('#simpan-perubahan').click(function()
    {
        var eventid=document.getElementById('eventid').value;
        var namakeg=document.getElementById('edit_namakeg').value;
        var tanggal=document.getElementById('edit_tanggal').value;
        var pukul=document.getElementById('edit_pukul_mulai').value;
        var pukulselesai=document.getElementById('edit_pukul_selesai').value;
        var penyelenggara=document.getElementById('edit_penyelenggara').value;
        var dataString='type=ganti&eventid='+eventid+'&namakeg='+namakeg+'&tanggal='+tanggal+'&pukul='+pukul+'&pukulselesai='+pukulselesai+'&penyelenggara='+penyelenggara;
        if (namakeg==""){
            $('#edit_namakeg').focus();
        }
        else if (tanggal==""){
            $('#edit_tanggal').focus();
        }
        else if (pukul==""){
            $('#edit_pukul_mulai').focus();
        }
        else if (pukulselesai==""){
            $('#edit_pukul_selesai').focus();
        }
        else if (penyelenggara==""){
            $('#edit_penyelenggara').focus();
        }
        else{
        
        //Ubah tulisan pada button saat click Simpan
        $('#simpan-perubahan').html('Menyimpan...');
            $.ajax({
                type:"post",
                url: "process.php",
                data:dataString,
                //dataType: 'json',
                //cache:false,
                success: function(pesan){
                    console.log(pesan);
                    if(pesan=='success_edit'){
                        $('#modal-tambah').modal('hide'); //tutup modal dialog
                        window.location="./";
                        //console.log(pesan);
                    }
                    else{
                        //Cetak peringatan
                        console.log(pesan);
                    }
                }
            });
            return false;
        }
    });

});