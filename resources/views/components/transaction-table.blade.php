
<div class="card">
    <div class="card-header">
        <h4>All Stock Transaction</h4>
    </div>
    <div class="card-body">

        {{-- <div class="form-group">

            <div class="row">
                <div class="col">
                    <form action="javascript:;" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                        {{@csrf_field()}}
                        <div class="input-group mb-3">
                            <input type="text" name="date_chosen" id="date_chosen" class="form-control daterange-btn">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i> <span>Search</span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    <form action="javascript:;" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                        {{@csrf_field()}}
                        <input type="text" name="date_chosen" id="date_chosen_copy" class="form-control daterange-btn" hidden>
                        <button type="submit" class="btn btn-success icon-left btn-icon float-right"><i class="fas fa-file"></i> <span>Export Excel</span>
                        </button>
                    </form>
                </div>
            </div>
            
        </div> --}}
        <div class="form-group">
            <button type="submit" onclick="window.print()" class="btn btn-success icon-left btn-icon float-right"><i class="fas fa-file"></i> <span>Print Report</span>
            </button>
        </div>
        <br><br>

        <div class="table-responsive">
            <table class="table table-md table-hover table-borderless" id="tables">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">
                            #
                        </th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price (RM)</th>
                        <th>Description</th>
                        <th>Added By</th>
                        <th>Created At</th>
 
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1; @endphp
                    @foreach ($datas as $data)
                        <tr class="text-center">
                            <td>
                                {{ $index }}
                            </td>
                            {{-- <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y g:i:s a')}}
                            </td> --}}
                            <td>
                                {{ $data->item }}

                                @if ($data->sub_item)
                                    - {{ $data->sub_item }}
                                @endif
                            </td>
                            <td>
                                {{ $data->now_quantity }}
                            </td>
                            <td>
                                {{ $data->now_price }}
                            </td>
                            <td>
                                {{ $data->description }}
                            </td>
                            <td>
                                {{ $data->updated_by_name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y g:i:s a')}}
                            </td>

                        </tr>
                        @php $index++; @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
