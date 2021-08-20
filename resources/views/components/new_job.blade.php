<h2 class="section-title">Request New Job</h2>
<p class="section-lead text-danger">Job that requires external printing will take at least 3 to 14 business days depending on the job requirement.</p>
<br>
<br>

{{-- <div class="row"> --}}
    <form action="/submit_jti" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
    <div class="card col-lg-6 col-md-6">
        <div class="card-header">
            <h4>Job Details</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-danger" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse" style="">
            <div class="card-body">

                {{-- start here --}}
                
                    {{@csrf_field()}}
        
                    <div class="form-group">
                        <label>Job Name</label>
                        <input type="text" class="form-control" name="job_name">
                    </div>
        
                    <div class="form-group">
                        <label>Job Status</label>
                        <select name="job_status" id="job_status" class="form-control selectric">
                            <option value="" selected="true" disabled="">Choose Status</option>
                            <option value="inter_household">Household effects</option>
                            <option value="inter_office">Office goods</option>
                            <option value="inter_industry">Industrial Equipment</option>
                            <option value="inter_vehicle">Vehicle</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="control-label">Job Status</div>
                        <label class="mt-2">
                            <input type="checkbox" id="packingSwitch" name="packingSwitch" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">URGENT JOB ?</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Job Type</label>
                        <div class="" style="padding-left: unset; padding-right: unset;">
                            <div class="selectgroup w-100 text-left">
                                <label class="selectgroup-item">
                                    <input type="radio" name="radio" value="normal" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Normal</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="radio" value="urgent" class="selectgroup-input">
                                    <span class="selectgroup-button">Urgent</span>
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
                        <textarea id="description" name="description" rows="3" class="form-control"></textarea>
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
                        <input type="text" class="form-control datepicker">
                    </div>


                {{-- </form> --}}

                {{-- end here  --}}
            </div>
        </div>
    </div>

    <div class="card col-lg-6 col-md-6">
        <div class="card-header">
            <h4>Person In-Charge Details</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-danger" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse2" style="">
 
            <div class="card-body">
                <div class="alert alert-light">
                    Change below information, if you wish to change PIC details.
                </div>
                <br>
                <div class="form-group">
                    <label>PIC Name</label>
                    <input type="text" class="form-control" name="requestor_name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="requestor_email">
                </div>

                <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" class="form-control" name="requestor_phone">
                </div>

                <div class="form-group">
                    <label>Office No</label>
                    <input type="text" class="form-control" name="requestor_office">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea id="address" name="address" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 70px;">
                    <button type="submit" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Submit</button>
                </div>
                
            </div>
        </div>
    </div>
</form>


{{-- </div> --}}

