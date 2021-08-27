<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Register Leaves') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>
   
    <div class="card">
    <div class="row">
        
        {{-- load component  --}}
       
        <x-register_leaves></x-register_leaves>
        <livewire:table.main name="leaveApplication" :model="$leaveApplication" />
    </div>
</div>

   
        
        
   


        
  
</x-app-layout>









<input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />

<script>

  // alert('hello')
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>



