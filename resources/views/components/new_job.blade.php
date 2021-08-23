@php

$user = auth()->user();

$details = Auth::user()->usersdetail;

// var_dump($details);

@endphp

<h2 class="section-title">Request New Job</h2>
<p class="section-lead text-danger">Job that requires external printing will take at least 3 to 14 business days depending on the job requirement.</p>
<br>
<br>

{{-- <div class="row"> --}}
    <form action="/request_job" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
    <div class="card col-lg-8 col-md-8">
        <div class="card-header">
            <h4 class="section-title">Job Details</h4>
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
                
                    {{@csrf_field()}}
        
                    {{-- <div class="form-group">
                        <label>Job Name</label>
                        <input type="text" class="form-control" name="job_name" required>
                    </div> --}}
        
                    <div class="form-group">
                        <label>Job Name</label>
                        <select name="job_name" id="job_name" class="form-control selectric" required>
                            <option value="" selected="true" disabled="">Choose Job</option>
                            <option value="inter_household">Advertisement</option>
                            <option value="inter_office">Banner</option>
                            <option value="inter_industry">Brochure</option>
                            <option value="inter_vehicle">Bunting</option>
                            <option value="inter_vehicle">Business Card</option>
                            <option value="inter_vehicle">Door Signage</option>
                            <option value="inter_vehicle">Envelope</option>
                            <option value="inter_vehicle">Flyers</option>
                            <option value="inter_vehicle">Letterhead</option>
                            <option value="inter_vehicle">Logo</option>
                            <option value="inter_vehicle">Poster</option>
                            <option value="inter_vehicle">Rubber Stamp</option>
                            <option value="inter_vehicle">T-shirt</option>
                            <option value="inter_vehicle">Door Signage</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="control-label">Job Status</div>
                        <label class="mt-2">
                            <input type="checkbox" id="urgent" name="urgent" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">URGENT JOB ?</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Job Type</label>
                        <div class="" style="padding-left: unset; padding-right: unset;">
                            <div class="selectgroup w-100 text-left">
                                <label class="selectgroup-item">
                                    <input type="radio" name="radio" value="printing" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Printing</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="radio" value="nonprinting" class="selectgroup-input">
                                    <span class="selectgroup-button">Non-printing</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>References (If any)</label>
                        <input type="text" class="form-control" name="job_name">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" name="description" rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Delivery Type</label>
                        <div class="" style="padding-left: unset; padding-right: unset;">
                            <div class="selectgroup w-100 text-left">
                                <label class="selectgroup-item">
                                    <input type="radio" name="radio2" value="delivery" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Delivery</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="radio2" value="self_pickup" class="selectgroup-input">
                                    <span class="selectgroup-button">Self-Pickup</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Dateline</label>
                        <input type="text" class="form-control datepicker" required>
                    </div>

                    <x-jet-section-border />
                    
                    <h4 class="section-title">Person In-Charge Details</h4>

                    <br>

                    <div class="alert alert-light">
                        Change below information, if you wish to change PIC details.
                    </div>

                    <br>
                    <div class="form-group">
                        <label>PIC Name</label>
                        <input type="text" class="form-control" name="requestor_name" value="{{$user->name}}" required>
                    </div>
    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="requestor_email" value="{{$user->email}}" required>
                    </div>
    
                    <div class="form-group">
                        <label>Contact No</label>
                        <input type="text" class="form-control" name="requestor_phone" value="{{$details->contact_no}}" required>
                    </div>
    
                    <div class="form-group">
                        <label>Office No</label>
                        <input type="text" class="form-control" name="requestor_office" value="{{$details->contact_no}}" required>
                    </div>
    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" name="address" rows="3" class="form-control">{{$details->address}}</textarea>
                    </div>
    
                    <div class="form-group" style="margin-bottom: 70px;">
                        <button type="submit" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Submit</button>
                    </div>


                {{-- </form> --}}

                {{-- end here  --}}
            </div>
        </div>
    </div>

</form>


{{-- </div> --}}

