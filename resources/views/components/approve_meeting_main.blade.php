<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Approve Meeting') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>



    <x-approve_meeting :pendingMeetings="$pendingMeeting"></x-approve_meeting>
  
    
        
</x-app-layout>



<script>
    $(document).ready(function () {
        $('.datepicker').daterangepicker({
            locale: {format: 'DD-MM-YYYY'},
            singleDatePicker: true,
        });

    });

    $("#table-5").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [0,2,3] }
        ]
    });
    
</script>
