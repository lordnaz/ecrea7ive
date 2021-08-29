<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>

@php
$role = auth()->user()->role;
$user = auth()->user();
#echo request();
@endphp
@include('flash-message')   
@if ($role =="superadmin" || $role ==  "admin") 
<div class="card">
    <div class="row">
 


           

    <div class="col-lg-5 col-md-12 col-12 col-sm-12">
        <div class="card-header">
            <h4 class="section-title">Register Leaves Information</h4>
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
                <form action="/requestleaves" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Insert register leaves information below.
                    </div>

        


                    <br>
                  
                    <div class="form-group">
                        <label>Requester</label>
                        <input type="text" class="form-control" name="fullname" value="{{$user->name ?? ''}}" required>
                    </div>



                    <div class="form-group">
                                <label>Date Range</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    </div>
                                    <input type="text" name="date_range" class="form-control daterange-cus">
                                </div>
                    </div>
            
                    <!-- <div class="form-group">
                        <label>Start Date and End Date</label>
                        <input type="text" class="form-control " name="date_range" />

                        
                    </div> -->

        
                    
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
            <h4 class="section-title">Leaves Application</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse3" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse3" style="">

        

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-md table-hover table-borderless" id="table-3">
                        <thead>
                            <tr class="text-center">
                               
                    
                                <th>Requester</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $index = 1; @endphp
                        @foreach ($leavesApplications as $leavesApplication)
                                <tr class="text-center">
                                    <td>
                                    {{ $leavesApplication->name }}
                                    </td>
                                    <td>
                                    {{ $leavesApplication->startdate }}
                                    </td>
                                    <td>
                                    {{ $leavesApplication->enddate }}
                                    </td>
                        
                                    <td>

                                    <a role="button" href="{{route('leaves_edit', $leavesApplication->id)}}" class="btn btn-icon btn-primary"><i class="fa fa-16px fa-pencil"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('delete', $leavesApplication->id)}}"><i class="fa fa-trash"></i></a>
                                  
                                   
                                   
                                   
                                </a>
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
    @endif   
    @if ($role =="user" || $role ==  "printer") 
   
    <div class="row">

    <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="section-title">Off-Duty Creative Staff</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse4" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse4" style="">

        

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-md table-hover table-borderless" id="table-6">
                        <thead>
                            <tr class="text-center">
                               
                    
                                <th>Requester</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @php $index = 1; @endphp
                        @foreach ($leavesApplications as $leavesApplication)
                                <tr class="text-center">
                                    <td>
                                    {{ $leavesApplication->name }}
                                    </td>
                                    <td>
                                    {{ $leavesApplication->startdate }}
                                    </td>
                                    <td>
                                    {{ $leavesApplication->enddate }}
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

    @endif  





