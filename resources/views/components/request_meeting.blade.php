<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>
<br>
@php
$role = auth()->user()->role;
$name = auth()->user()->name;
#echo request();
@endphp


<div class="col-lg-5 col-md-12 col-12 col-sm-12">
              

{{-- <div class="card col-lg-6 col-md-6"> --}}
        <div class="card-header">
            <h4 class="section-title">Meeting Request Information</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse2" style="">
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
                <form action="/request_meeting" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Insert request meeting information below.
                    </div>

        


                    <br>

                    <div class="form-group">
                        <label>Meeting Subject</label>
                        <input type="text" class="form-control" name="subject ">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" name="description" rows="3" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department ">
                    </div>
                   
                   
            
                    <div class="form-group">
                        <label>Start Date and End Date</label>
                        <input type="text" class="form-control daterange" name="datetime">
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






























