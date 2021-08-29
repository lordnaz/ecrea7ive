<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>
<br>
@php
$role = auth()->user()->role;
#echo request();
@endphp



<div class="card col-lg-12 col-md-12">
    <div class="card-header">
        <h4 class="section-title">Stock Details</h4>
        <div class="card-header-action">
            <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="mycard-collapse2" style="">
        <div class="card-body">

            <div class="row">
                @foreach ($stocks as $stock)

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 border border-secondary">

                        @if ($stock->quantity < 5)
                            <div class="card-icon bg-danger">
                                <i class="fas fa-cube"></i>
                            </div>
                        @else
                            <div class="card-icon bg-success">
                                <i class="fas fa-cube"></i>
                            </div>
                        @endif
    
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="text-dark">
                                    {{$stock->item}}
                                    @if ($stock->sub_item)
                                        <small class="text-muted">- {{$stock->sub_item}}</small>
                                    @endif
                                </h4>
                            </div>
                            <div class="card-body">
                                <b class="text-dark">{{$stock->quantity}}</b>
                                
                                <div class="text-small text-muted">{{$stock->updated_by_name}} <div class="bullet"></div>{{ \Carbon\Carbon::parse($stock->updated_at)->diffForHumans()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>




































