<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Update Meeting') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>
    

    <x-meeting_edit :meetingEdits="$meetingEdit"></x-meeting_edit>
 
    
   
        
        
   


        
  
</x-app-layout>






<script>
    $(document).ready(function () {
        $('input[name="datefilter"]').daterangepicker({
            locale: {format: 'DD-MM-YYYY'},
            singleDatePicker: true,
        });

    });
    
</script>



<input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />

<script>

$('.daterange-cus').daterangepicker({
        locale: {format: 'YYYY-MM-DD'},
        drops: 'down',
        opens: 'right'
    });

$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>



