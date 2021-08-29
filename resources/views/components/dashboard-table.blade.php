
<div class="card">
    <div class="card-header">
        <h4>Job List</h4>
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

        <div class="table-responsive">
            <table class="table table-md table-hover table-borderless" id="table-1">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">
                            #
                        </th>
                        {{-- <th>Date Created</th> --}}
                        <th>Ticket ID</th>
                        <th>Job Name</th>
                        <th>Owner</th>
                        <th>Contact</th>
                        <th>Dateline</th>
                        <th>Active</th>
                        <th>Progress Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1; @endphp
                    @foreach ($items as $item)
                        <tr class="text-center">
                            <td>
                                {{ $index }}
                            </td>
                            {{-- <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y g:i:s a')}}
                            </td> --}}
                            <td>
                                {{ $item->ticket_id }}
                            </td>
                            <td>
                                {{ $item->job_name }}
                            </td>
                            <td>
                                {{ $item->pic_name }}
                            </td>
                            <td>
                                {{ $item->pic_contact_no }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->dateline)->format('d/m/Y')}}
                            </td>
                            <td>
                                @if ($item->active == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else 
                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                                
                            </td>
                            <td>
                                @if ($item->ticket_status == "ACKNOWLEDGE")
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" data-width="30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <small>30%</small> 
                                        </div>
                                    </div>
                                
                                @elseif($item->ticket_status == "REVIEW")
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" data-width="45%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <small>45%</small> 
                                        </div>
                                    </div>

                                @elseif($item->ticket_status == "APPROVED")
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" data-width="60%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <small>60%</small> 
                                        </div>
                                    </div>

                                @elseif($item->ticket_status == "RECEIVED")
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" data-width="95%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <small>95%</small> 
                                        </div>
                                    </div>

                                @elseif($item->ticket_status == "CLOSED")
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <small>100%</small> 
                                        </div>
                                    </div>

                                @elseif($item->ticket_status == "CANCELLED")
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>

                                @else
                                    {{ $item->ticket_status }}
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar bg-info" role="progressbar" data-width="20%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <small>20%</small> 
                                        </div>
                                    </div>
                                @endif
                                
                            </td>
                            <td>
                                <a href="{{route('ticket', $item->ticket_id)}}" class="btn btn-dark">
                                    <i class="far fa-check-circle"></i>
                                    Open Ticket
                                </a>
                            </td>
                        </tr>
                        @php $index++; @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
