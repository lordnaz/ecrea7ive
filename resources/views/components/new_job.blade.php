@php

$user = auth()->user();

$details = Auth::user()->usersdetail;

// var_dump($details);

// die();

@endphp

<h2 class="section-title">Request New Job</h2>
<br>
<br>

{{-- <div class="row"> --}}
    <form action="/update_profile" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
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
                    <div class="alert alert-danger alert-dismissible show fade">
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
                            <option value="Advertisement">Advertisement</option>
                            <option value="Banner">Banner</option>
                            <option value="Brochure">Brochure</option>
                            <option value="Bunting">Bunting</option>
                            <option value="Business Card">Business Card</option>
                            <option value="Door Signage">Door Signage</option>
                            <option value="Envelope">Envelope</option>
                            <option value="Flyers">Flyers</option>
                            <option value="Letterhead">Letterhead</option>
                            <option value="Logo">Logo</option>
                            <option value="Poster">Poster</option>
                            <option value="Rubber Stamp">Rubber Stamp</option>
                            <option value="T-shirt">T-shirt</option>
                            <option value="Door Signage">Door Signage</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <div id="others_panel">  
                        <div class="form-group">
                            <label>Others (Please specify)</label>
                            <input type="text" class="form-control" name="others" id="others">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="control-label">Job Status</div>
                        <label class="mt-2">
                            <input type="checkbox" id="job_status" name="job_status" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">URGENT JOB ?</span>
                        </label>
                    </div>
                    
                    <div class="alert alert-light">
                        Minimum dateline for <b>[Normal Job]</b> is 3 days from now on <br> Minimum dateline for <b>[Urgent Job]</b> is 1 days from now on.
                    </div>
                    
                    <div class="form-group">
                        <label>Dateline</label>
                        <input type="text" name="dateline" class="form-control datepicker" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Job Type</label>
                        <div class="" style="padding-left: unset; padding-right: unset;">
                            <div class="selectgroup w-100 text-left">
                                <label class="selectgroup-item">
                                    <input type="radio" name="job_type" value="Printing" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Printing</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="job_type" value="Non-Printing" class="selectgroup-input">
                                    <span class="selectgroup-button">Non-printing</span>
                                </label>
                            </div>
                        </div>
                        <p class="text-danger">Job that requires external printing will take at least 3 to 14 business days depending on the job requirement.</p>
                    </div>

                    <div class="form-group">
                        <label>References (If any)</label>
                        <input type="text" class="form-control" name="references">
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
                                    <input type="radio" name="delivery_type" value="Delivery" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Delivery</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="delivery_type" value="Self-Pickup" class="selectgroup-input">
                                    <span class="selectgroup-button">Self-Pickup</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <x-jet-section-border />
                    
                    <h4 class="section-title">Person In-Charge Details</h4>

                    <br>

                    <div class="alert alert-light">
                        {{-- <small id="passwordHelpBlock" class="form-text text-muted"> --}}
                            This information will be taken from your profile. If you wish to change the PIC details, please change below information.
                        {{-- </small> --}}
                    </div>
                    

                    <br>
                    <div class="form-group">
                        <label>PIC Name</label>
                        <input type="text" class="form-control" name="pic_name" value="{{$user->name ?? ''}}" required>
                    </div>
         
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="pic_email" value="{{$user->email ?? ''}}" required>
                    </div>
    
                    <div class="form-group">
                        <label>Contact No</label>
                        <input type="text" class="form-control" name="pic_contact_no" value="{{$details->contact_no ?? ''}}" required>
                    </div>
    
                    <div class="form-group">
                        <label>Office No</label>
                        <input type="text" class="form-control" name="pic_office_no" value="{{$details->contact_no ?? ''}}">
                    </div>
    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" name="pic_address" rows="3" class="form-control" required>{{$details->address ?? ''}}</textarea>
                        {{-- <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </small> --}}
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="pic_postcode" value="{{$details->postcode ?? ''}}" required>
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

