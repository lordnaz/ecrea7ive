<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Meeting Request') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>

        
        {{-- load component  --}}
       
        <x-request_meeting :listMeetings="$listMeeting"></x-request_meeting>
        

   
        
        
   


        
  
</x-app-layout>






<script>
    $(document).ready(function () {
        $('input[name="datefilter"]').daterangepicker({
            locale: {format: 'DD-MM-YYYY'},
            singleDatePicker: true,
        });

    });
    
</script>





<input type="text" name="datetimes" />

<script>


  
    // $('#datetimepicker1').datetimepicker();
 
    $('.datetimepicker').daterangepicker({
        locale: {format: 'DD-MM-YYYY HH:mm p'},
        singleDatePicker: true,
        timePicker: true,
        // timePicker24Hour: true,
      });
    





$("#table-4").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [0,2,3] }
        ]
    });


    $('.daterange-cus').daterangepicker({
        locale: {format: 'YYYY-MM-DD'},
        drops: 'down',
        opens: 'right'
    });


    $('.daterange-time').daterangepicker({
  timePicker: true,
  startDate: moment().startOf('hour'),
  endDate: moment().startOf('hour').add(32, 'hour'),
  locale: {
    format: 'M-DD-YY hh:mm A'
  }
});

</script>
