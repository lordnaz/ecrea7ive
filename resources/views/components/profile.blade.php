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
                <form action="/request_job" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Change below information, if you wish to change PIC details.
                    </div>

                    <br>
        
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" class="form-control" name="role">
                    </div>

                    <div class="form-group">
                        <label>Mobile No</label>
                        <input type="text" class="form-control" name="mobile_no">
                    </div>

                    <div class="form-group">
                        <label>Office No</label>
                        <input type="text" class="form-control" name="office_no">
                    </div>

                    <div class="form-group">
                        <label>Division</label>
                        <input type="text" class="form-control" name="office_no">
                    </div>

                    <div class="form-group">
                        <label>HOD Name</label>
                        <input type="text" class="form-control" name="hod">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" name="address" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" class="form-control" name="office_no">
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

