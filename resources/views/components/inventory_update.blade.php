<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>
<br>
@php
$role = auth()->user()->role;
#echo request();
@endphp


<div class="card col-lg-12 col-md-12">
    <div class="card-header">
        <h4 class="section-title">Stock Monitor</h4>
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


<div class="card col-lg-12 col-md-12">
    <div class="card-header">
        <h4 class="section-title">Available Stock</h4>
        <div class="card-header-action">
            <a data-collapse="#mycard-collapse3" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="mycard-collapse3" style="">
        <div class="card-body">
            

            <div class="row">
                <div class="col-5">

                    <div class="alert alert-warning text-dark">
                        <b>Key-in properly!</b> submission of this form will affecting the <b>Stock Monitor</b>.
                    </div>

                    <form method="POST" action="{{ route('update_stock') }}">
                        @csrf
    
                        <div class="form-group">
                            <label>Item</label>
                            <select name="stock_name" id="stock_name" class="form-control selectric" required>
                                <option value="" selected="true" disabled="">Choose Item</option>
                                @foreach ($stocks as $stock)
                                    <option value="{{$stock->item}}|{{$stock->sub_item}}">
                                        {{$stock->item}}
                                        @if ($stock->sub_item)
                                            - {{$stock->sub_item}}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                        </div>
    
                        <div class="form-group text-right" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary">
                                Update Stock
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-1"></div>

                <div class="col-5">

                    

                </div>

                <div class="col-1"></div>
                
            </div>
        </div>
    </div>
</div>



<div class="card col-lg-12 col-md-12">
    <div class="card-header">
        <h4 class="section-title">Stock Purchase Transaction</h4>
        <div class="card-header-action">
            <a data-collapse="#mycard-collapse4" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="mycard-collapse4" style="">
        <div class="card-body">
            

            <div class="row">
                <div class="col-5">

                    <div class="alert alert-warning text-dark">
                        <b>Key-in properly!</b> submission of this form will affecting the purchase transaction record.
                    </div>

                    <form method="POST" action="{{ route('add_transaction') }}">
                        @csrf
    
                        <div class="form-group">
                            <label>Item</label>
                            <select name="stock_name" id="stock_name" class="form-control selectric" required>
                                <option value="" selected="true" disabled="">Choose Item</option>
                                @foreach ($stocks as $stock)
                                    <option value="{{$stock->item}}|{{$stock->sub_item}}">
                                        {{$stock->item}}
                                        @if ($stock->sub_item)
                                            - {{$stock->sub_item}}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                        </div>

                        <div class="form-group">
                            <label>Price (RM)</label>
                            <input type="number" class="form-control" name="price" id="price" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="description" name="description" rows="3" class="form-control" required></textarea>
                        </div>
    
                        <div class="form-group text-right" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary">
                                Add Purchase
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-1"></div>

                <div class="col-5">

                    <div class="card gradient-bottom shadow-none">
                        <div class="card-header">
                            <h4>Last 5 Purchase Record</h4>
                        </div>
                        <div class="card-body" id="top-5-scroll">
                            <ul class="list-unstyled list-unstyled-border">
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($transactions as $transaction)
                                    @php
                                        $last = 0;
                                        $latest = 0;

                                        $total = $transaction->prev_quantity + $transaction->now_quantity;

                                        $last = ($transaction->prev_quantity/$total)*100;

                                        $latest = ($transaction->now_quantity/$total)*100;
                                    @endphp
                                    <li class="media">
                                        <img class="mr-3 rounded" width="55" src="../assets/img/products/product-2-50.png" alt="product">
                                        <div class="media-body">
                                            <div class="float-right"><div class="font-weight-600 text-muted text-small">{{$transaction->sub_item}}</div></div>
                                            <div class="media-title">
                                                {{$transaction->item}}
                                            </div>
                                            <div class="mt-1">
                                                <div class="budget-price">
                                                    <div class="budget-price-square bg-warning" data-width="{{$last}}%"></div>
                                                    <div class="budget-price-label">RM{{$transaction->prev_price}} ({{$transaction->prev_quantity}})</div>
                                                </div>
                                                <div class="budget-price">
                                                    <div class="budget-price-square bg-success" data-width="{{$latest}}%"></div>
                                                    <div class="budget-price-label">RM{{$transaction->now_price}} ({{$transaction->now_quantity}})</div>
                                                </div>
                                            </div>
                                            <div class="float-left">
                                                <div class="text-muted text-small">
                                                    <small>{{ \Carbon\Carbon::parse($transaction->created_at)->diffForHumans()}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    @if ($index++ == 4)
                                        @break
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center" style="margin-top: 10px;">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-warning" data-width="20"></div>
                                <div class="budget-price-label">Previous</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-success" data-width="20"></div>
                                <div class="budget-price-label">New</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <a href="{{ route('all_transaction') }}" class="ticket-item ticket-more">
                                    View All <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

                <div class="col-1"></div>
                
            </div>
        </div>
    </div>
</div>






<div class="card col-lg-12 col-md-12">
    <div class="card-header">
        <h4 class="section-title">Add Stock</h4>
        <div class="card-header-action">
            <a data-collapse="#mycard-collapse3" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="mycard-collapse3" style="">
        <div class="card-body">
            

            <div class="row">
                <div class="col-5">

                    <div class="alert alert-warning text-dark">
                        <b>Key-in properly!</b> submission of this form will affecting the <b>Stock Monitor</b>.
                    </div>
                    <form action="/addStock" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                    <!-- <form method="POST" action="{{ route('update_stock') }}"> -->
                        @csrf
    
                        <div class="form-group">
                            <label>Item</label>
                            <input type="text" class="form-control" name="item" id="item" required>
                        </div>
    
                        <div class="form-group">
                            <label>Sub Item</label>
                            <input type="text" class="form-control" name="sub_item" id="sub_item" required>
                        </div>
    
                        <div class="form-group text-right" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary">
                                Add Stock
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-1"></div>

                <div class="col-5">

                    

                </div>

                <div class="col-1"></div>
                
            </div>
        </div>
    </div>
</div>






























