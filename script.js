$(document).ready(function() {
    $.ajax({
		url: 'auth/process.php',
        type: 'POST', // Send post data
        data: 'type=fetch',
        async: false,
        success: function(s){
        	json_events = s;
        }
	});

        /* initialize the calendar
		-----------------------------------------------------------------*/
		$('#calendar').fullCalendar({
			header: {
				left: 'prev title next today',
				center: '',
				right: 'basicDay,basicWeek,month'
			},
            lang: 'id',
            height: 'auto',
            //theme: true,
            defaultView: 'month',
            businessHours: false, // display business hours
            //utc: true,
            events: JSON.parse(json_events),
            eventClick: function(event, jsEvent, view) {
//                $('#detailkampus').html(event.tempat);
                $('#namakegiatan').html(event.title);
                $('#waktu').html(event.mulai + ' ' + event.pukulmulai + ' - ' + event.pukulselesai);
//                $('#detailselesai').html(event.selesai + ' ' + event.pukulselesai);
                $('#penanggungjawab').html(event.penanggungjawab);
//                $('#ket').html(event.keterangan);
                $('#modal-detail').modal('show'); //buka modal detail
//                // change the border color just for fun
//                //$(this).css('border-color', 'yellow');
            }
		});
    });