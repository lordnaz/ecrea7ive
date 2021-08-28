<!-- <h2 class="section-title">Register Leaves</h2> -->

<br>
<br>
@php
$role = auth()->user()->role;
#echo request();
@endphp



<div class="card col-lg-12 col-md-12">
    <div class="card-header">
        <h4 class="section-title">Purchasing Stock</h4>
        <div class="card-header-action">
            <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="mycard-collapse2" style="">
        <div class="card-body">
            

            <div class="row">
                <div class="col-5">

                    <div class="alert alert-light">
                        <b>Key-in properly!</b> submission of this form will affecting the inventory report as purchase record.
                    </div>

                    <form method="POST" action="{{ route('post_message') }}">
                        @csrf
    
                        <div class="form-group">
                            <label>Item</label>
                            <select name="job_name" id="job_name" class="form-control selectric" required>
                                <option value="" selected="true" disabled="">Choose Item</option>
                                @foreach ($stocks as $stock)
                                    <option value="Advertisement">
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
                            <input type="text" class="form-control" name="quantity" id="quantity" required>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" id="price" required>
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
                          {{-- <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                              <li class="dropdown-title">Select Period</li>
                              <li><a href="#" class="dropdown-item">Today</a></li>
                              <li><a href="#" class="dropdown-item">Week</a></li>
                              <li><a href="#" class="dropdown-item active">Month</a></li>
                              <li><a href="#" class="dropdown-item">This Year</a></li>
                            </ul>
                          </div> --}}
                        </div>
                        <div class="card-body" id="top-5-scroll">
                          <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                              <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product">
                              <div class="media-body">
                                <div class="float-right"><div class="font-weight-600 text-muted text-small">Total: 86</div></div>
                                <div class="media-title">oPhone S9 Limited</div>
                                <div class="mt-1">
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-warning" data-width="64%"><small class="text-muted">previous</small></div>
                                    <div class="budget-price-label">RM68,714 (17)</div>
                                  </div>
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-success" data-width="43%"><small class="text-muted">new</small></div>
                                    <div class="budget-price-label">RM38,700 (8)</div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="media">
                              <img class="mr-3 rounded" width="55" src="../assets/img/products/product-4-50.png" alt="product">
                              <div class="media-body">
                                <div class="float-right"><div class="font-weight-600 text-muted text-small">Total: 67</div></div>
                                <div class="media-title">iBook Pro 2018</div>
                                <div class="mt-1">
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-primary" data-width="84%"></div>
                                    <div class="budget-price-label">$107,133</div>
                                  </div>
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-danger" data-width="60%"></div>
                                    <div class="budget-price-label">$91,455</div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="media">
                              <img class="mr-3 rounded" width="55" src="../assets/img/products/product-1-50.png" alt="product">
                              <div class="media-body">
                                <div class="float-right"><div class="font-weight-600 text-muted text-small">Total: 63</div></div>
                                <div class="media-title">Headphone Blitz</div>
                                <div class="mt-1">
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-primary" data-width="34%"></div>
                                    <div class="budget-price-label">$3,717</div>
                                  </div>
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-danger" data-width="28%"></div>
                                    <div class="budget-price-label">$2,835</div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="media">
                              <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product">
                              <div class="media-body">
                                <div class="float-right"><div class="font-weight-600 text-muted text-small">Total: 28</div></div>
                                <div class="media-title">oPhone X Lite</div>
                                <div class="mt-1">
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-primary" data-width="45%"></div>
                                    <div class="budget-price-label">$13,972</div>
                                  </div>
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-danger" data-width="30%"></div>
                                    <div class="budget-price-label">$9,660</div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="media">
                              <img class="mr-3 rounded" width="55" src="../assets/img/products/product-5-50.png" alt="product">
                              <div class="media-body">
                                <div class="float-right"><div class="font-weight-600 text-muted text-small">Total: 19</div></div>
                                <div class="media-title">Old Camera</div>
                                <div class="mt-1">
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-primary" data-width="35%"></div>
                                    <div class="budget-price-label">$7,391</div>
                                  </div>
                                  <div class="budget-price">
                                    <div class="budget-price-square bg-danger" data-width="28%"></div>
                                    <div class="budget-price-label">$5,472</div>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                          <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-primary" data-width="20"></div>
                            <div class="budget-price-label">Selling Price</div>
                          </div>
                          <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-danger" data-width="20"></div>
                            <div class="budget-price-label">Budget Price</div>
                          </div>
                        </div>
                      </div>

                </div>

                <div class="col-1"></div>
                
            </div>
        </div>
    </div>
</div>




































