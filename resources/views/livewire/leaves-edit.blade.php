


@php
$role = auth()->user()->role;
$name = auth()->user()->name;
#echo request();
@endphp

{{-- <div class="row"> --}}
    <div class="card col-lg-8 col-md-8">
        <div class="card-header">
            <h4 class="section-title">Edit Leaves Information</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse" style="">
            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                {{-- start here --}}
                <form action="/updateUser" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Insert updated leaves information below.
                    </div>

                    <br>
        
                    
                    <div class="form-group">
                        <label>Requester</label>
                        <input type="text" class="form-control" name="name" input="user.name">
                    </div>

                  
                    <div class="form-group">
                        <label>Start Date and End Date</label>
                        <input type="text"  class="form-control " name="daterange"/>
                 

                        
                    </div>

                   

                   


        
                    
                    <div class="form-group" style="margin-bottom: 70px;">
                        <button type="submit" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Update</button>
                    </div>

                </form>


                {{-- </form> --}}

                {{-- end here  --}}
            </div>
        </div>
    </div>




{{-- </div> --}}

<script>
    $(document).ready(function () {
        $('input[name="datefilter"]').daterangepicker({
            locale: {format: 'DD-MM-YYYY'},
            singleDatePicker: true,
        });

    });
    
</script>





<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
