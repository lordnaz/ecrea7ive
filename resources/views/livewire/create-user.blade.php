
@include('flash-message')   
{{-- <div class="row"> --}}
    <div class="card col-lg-8 col-md-8">
        <div class="card-header">
            <h4 class="section-title">Create User Information</h4>
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
                <form action="/createUser" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Insert new user information below.
                    </div>

                    <br>
        
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" wire:model.defer="state.password" autocomplete="new-password" required>
                    <input-error for="password" class="mt-2" />
                    </div>

                    <div class="form-group">
                    <label>Roles</label>
                                                    
                    <select class="form-control role" id="role" name="role" required="" aria-required="true" required>
                    <option selected="true" disabled="">Choose Roles</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="printer">Printer</option>
    
                    </select>                                  

                     </div>

                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="position">
                    </div>

                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="company_name">
                    </div>

                    <div class="form-group">
                        <label>Branch</label>
                        <input type="text" class="form-control" name="branch">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department">
                    </div>
        
                    <div class="form-group">
                        <label>HOD</label>
                        <input type="text" class="form-control" name="hod">
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




{{-- </div> --}}

