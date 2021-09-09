<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>
@include('flash-message')   
@php
$role = auth()->user()->role;
$name = auth()->user()->name;
#echo request();
@endphp




<div class="card">
    <div class="row">




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
                <form action="/requestMeeting" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Insert request meeting information below.
                    </div>

        


                    <br>

                    <div class="form-group">
                        <label>Meeting Subject</label>
                        <input type="text" class="form-control" name="meeting_subject">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" name="description" rows="3" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department">
                    </div>
                   
                   
            
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="text" class="form-control datetimepicker" name="datetimes">
                    </div>

        


                    
                    <div class="form-group" style="margin-bottom: 70px;">
                        <button type="submit" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Submit</button>
                    </div>

                </form>


                {{-- </form> --}}

                {{-- end here  --}}
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-12 col-12 col-sm-12">
        <div class="card-header">
            <h4 class="section-title">Meeting Request Status</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse3" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse3" style="">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-md table-hover table-borderless" id="table-4">
                        <thead>
                            <tr class="text-center">
                               
                    
                                <th>Requester</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>Date Time</th>
                                <th>Status</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        @php $index = 1; @endphp
                        @foreach ($listMeetings as $listMeeting)
                                <tr class="text-center">
                                    <td>
                                    {{ $name }}
                                    </td>
                                    <td>
                                    {{ $listMeeting->department }}
                                    </td>
                                    <td>
                                    Meeting Subject :
                                    <b>{{ $listMeeting->meeting_subject }}</b><br>
                                    Description :
                                    <b>{{ $listMeeting->description }}</b>
                                    </td>
                                    <td>
                                    Start Date : <br>
                                    <b>{{ $listMeeting->startdate }}</b><br>
                                   
                                    </td>
                                    <td>
                                    @if($listMeeting->job_status == "PENDING")
                                   
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                    @elseif($listMeeting->job_status == "APPROVED")
                                 
                                    <span class="badge badge-pill badge-success">Approved</span>
                                     @elseif($listMeeting->job_status == "REJECTED")
                                     <span class="badge badge-pill badge-danger">Rejected</span>
                                    @endif

                                    

                                    

                                  
                                   
                                
                                    </td>
                                </tr>
                             
                                @php $index++; @endphp
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

 
           



</div>
</div>


{{-- </div> --}}






























