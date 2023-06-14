<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    .fc-area {
        font-size: 12px;
        color: #040404;\
        text-align: center;
      }

      .fc-item {
        font-size: 12px;
        color: #000000;
        text-align: center;
      }
      .fc-title {
        font-size: 13px; /* Ubah ukuran teks sesuai kebutuhan Anda */
        text-align: center;
      }
      .fc-title {
        font-size: 0; /* Menyembunyikan teks keterangan */
        text-align: center;
      }

      .fc-title i {
        font-size: 15px; /* Ubah ukuran ikon sesuai kebutuhan Anda */
      }
</style>


  </head>
  <body>

    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Events</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-2">
                  <label for="recipient-name" class="col-form-label">Status</label>
                  <select class="form-select" id="title">
                    <option selected>Select...</option>
                    <option value="Ok">Ok</option>
                    <option value="Trouble">Trouble</option>
                  </select>
                </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="message-text" class="col-form-label">Area</label>
                            <select class="form-select" id="area">
                                <option selected>Select...</option>
                                <option value="Showroom">Showroom</option>
                                <option value="Bengkel GR">Bengkel Gr</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="message-text" class="col-form-label">Item</label>
                            <select class="form-select" id="item">
                                <option selected>Select...</option>
                                <option value="LAN">LAN</option>
                                <option value="WAN">WAN</option>
                                <option value="Cabling">Cabling</option>
                                <option value="IAMS VPN">IAMS / VPN</option>
                                <option value="Wifi">Wifi</option>
                            </select>
                        </div>
                    </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
    </div>

    <div class="container">
        <div class="row-12">
            <div class="col">
                <h3 class="text-center mt-5">FullCalendar Testing</h3>
                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id="calendar">

                        <div class="fc-area">Area A</div>
                        <div class="fc-item">Item B</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var booking = @json($events);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#calendar').fullCalendar({

                eventRender: function(event, element) {
                    var iconClass = ''; // Tambahkan variabel ikon berdasarkan jenis event atau kebutuhan Anda

                    if (event.title === 'Ok') {
                        iconClass = 'fas fa-check-circle'; // Contoh ikon untuk event dengan judul 'Ok'
                    } else if (event.title === 'Trouble') {
                        iconClass = 'fas fa-exclamation-triangle'; // Contoh ikon untuk event dengan judul 'Trouble'
                    }

                    element.find('.fc-title').html('<i class="' + iconClass + '"></i>');
                    element.find('.fc-title').append('<div class="fc-area">' + event.area + '</div>');
                    element.find('.fc-title').append('<div class="fc-item">' + event.item + '</div>');
                  },

                header: {
                    left:'prev,next today',
                    center:'title',
                    right:'month , agendaWeek , agendaDay',
                },
                displayEventTime: false,
                events: booking,
                selectable: true,
                selecthelper: true,
                editable:true,
                select: function (start, end , allDays){
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var area = $('#area').val();
                        var item = $('#item').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(start).format('YYYY-MM-DD');

                        $.ajax({
                            url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{title,area,item,start_date,end_date},
                            success:function(response)
                            {
                                $('#bookingModal').modal('hide');

                                $('#calendar').fullCalendar('renderEvent',{
                                    'title':response.title,
                                    'area':response.area,
                                    'item':response.item,
                                    'start':response.start_date,
                                    'end':response.end_date,
                                });
                                swal("Good job!", "You clicked the button!", "success");
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors){
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        });
                    })
                },
                eventsDrop:function (event){
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');

                    $.ajax({
                        url:"{{ route('calendar.update','') }}" + '/' + id,
                        type:"PATCH",
                        dataType:'json',
                        data:{start_date,end_date},
                        success:function(response)
                        {
                            swal("Good job!", "You clicked the button!", "success");
                        },
                        error:function(error)
                        {
                            console.log(error)
                        },
                    });
                },
                eventClick:function(event){
                    var id = event.id;

                    if(confirm('Are you sure want to remove it')){
                        $.ajax({
                            url:"{{ route('calendar.destroy','') }}" + '/' + id,
                            type:"DELETE",
                            dataType:'json',
                            success: function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents',response)

                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    }
                },

            });

            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
