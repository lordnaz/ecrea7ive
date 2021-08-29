<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Register Leaves') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>
   
   
        
        {{-- load component  --}}
       
        <x-register_leaves :leavesApplications="$leavesApplication"></x-register_leaves>
       
 
   
        
        
   


        
  
</x-app-layout>









<input type="text" name="date_range" value="01/01/2018 - 01/15/2018" />

<script>

$("#table-3").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });


$('.daterange-cus').daterangepicker({
        locale: {format: 'YYYY-MM-DD'},
        drops: 'down',
        opens: 'right'
    });

  // }

  // alert('hello')
$(function() {
  $('input[name="date_range2"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});



$(function() {
   //get all delete links (Note the class I gave them in the HTML)
   $("a.delete-link").click(function() {
       //Basically, if confirm is true (OK button is pressed), then
       //the click event is permitted to continue, and the link will
       //be followed - however, if the cancel is pressed, the click event will be stopped here.
       return confirm("Are you sure you want to delete this?");
   });
});



$("#table-6").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [0,1,2] }
  ]
});
</script>



