<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Meeting Request') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>
    <div class="col-lg-13 col-md-13 col-13 col-sm-13">
    <div class="card">
    <div class="row">
        
        {{-- load component  --}}
       
        <x-request_meeting></x-request_meeting>
        <livewire:table.main name="requestMeeting" :model="$requestMeeting" />
        
    </div>
</div>
</div>
   
        
        
   


        
  
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
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>


