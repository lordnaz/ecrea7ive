<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>
<br>
@php
$role = auth()->user()->role;
#echo request();
@endphp


{{-- <div class="row"> --}}
    <div class="card col-lg-8 col-md-8">
        <div class="card-header">
            <h4 class="section-title">New Stock Purchase</h4>
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
                <form action="/inventory" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                
                    {{@csrf_field()}}

                    <div class="alert alert-light">
                        Insert new stock purchase information below.
                    </div>

                    <br>
                    @if ($role =="superadmin")
                    <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Price (RM)</label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" name="description" rows="3" class="form-control"></textarea>
                    </div>
                   
                    @endif
            


        
                    
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

































