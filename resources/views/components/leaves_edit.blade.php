
   @include('flash-message')  
   <div class="row">
    
    <div class="col-lg-5 col-md-12 col-12 col-sm-12">
    <div class="card">
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
                <form action="/updateLeaves" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Update leaves information below.
                    </div>

                    <input type="hidden" class="form-control" name="id" value="{{ $leavesDetails->id}}" required>


                    <br>
                  
                    <div class="form-group">
                        <label>Requester</label>
                        <input type="text" class="form-control" name="fullname" value="{{ $leavesDetails->name}}" required>
                    </div>



                    <div class="form-group">
                                <label>Date Range</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    </div>
                                    <input type="text" name="date_range" value="{{ $leavesDetails->startdate}}-{{ $leavesDetails->enddate}}  " class="form-control daterange-cus">
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

</div>
</div>
