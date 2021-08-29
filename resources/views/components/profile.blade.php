@php

$user = auth()->user();

$details = Auth::user()->usersdetail;

// var_dump($details);

// die();

@endphp
@include('flash-message')   

{{-- <h2 class="section-title">Request New Job</h2>
<p class="section-lead text-danger">Job that requires external printing will take at least 3 to 14 business days depending on the job requirement.</p>
<br>
<br> --}}

{{-- <div class="row"> --}}
    <div class="card col-lg-8 col-md-8">
        <div class="card-header">
            <h4 class="section-title">Profile Information</h4>
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
                <form action="/updateProfile" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Update below information for your profile details.
                    </div>

                    <br>
        
                    

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}"readonly="">
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="company_name"value="{{$details->company_name ?? ''}}">
                    </div>

                    <div class="form-group">
                        <label>Branch</label>
                        <input type="text" class="form-control" name="branch"value="{{$details->branch ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department"value="{{$details->department ?? ''}}">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" name="address" rows="3" class="form-control" >{{$details->address ?? ''}}</textarea>
                        {{-- <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </small> --}}
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{$details->postcode ?? ''}}">
                    </div>

                

                    <div class="form-group">
                        <label>Mobile No</label>
                        <input type="text" class="form-control" name="mobile_no"value="{{$details->contact_no ?? ''}}">
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

