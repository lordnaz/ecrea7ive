

<!-- <h2 class="section-title">Pending Request Time Slot</h2> -->
<br>
@include('flash-message')   

{{-- <div class="row"> --}}




<div class="card">
<div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card-header">
            <h4 class="section-title">Meeting Request Time Slot </h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse3" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="collapse show" id="mycard-collapse3" style="">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-md table-hover table-borderless" id="table-5">
                        <thead>
                            <tr class="text-center">
                               
                    
                                <th>Requester</th>
                                <th>Approve/Reject By</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>Date Time</th>
                                <th>Status</th>
                              
                              
                            </tr>
                        </thead>
                        <tbody>
                        @php $index = 1; @endphp
                        @foreach ($pendingMeetings as $pendingMeeting)
                        <tr class="text-center">
                                    <td>
                                    {{ $pendingMeeting->name}}
                                    </td>
                                    <td>
                                    {{ $pendingMeeting->approved_by}}
                                    </td>
                                    <td>
                                    {{ $pendingMeeting->department }}
                                    </td>
                                    <td>
                                    Meeting Subject :
                                    <b>{{ $pendingMeeting->meeting_subject }}</b><br>
                                    Description :
                                    <b>{{ $pendingMeeting->description }}</b>
                                    </td>
                                    <td>
                                    Start Date :
                                    <b>{{ $pendingMeeting->startdate }}</b><br>
                                    End Date :
                                    <b>{{ $pendingMeeting->enddate }}</b>
                                    </td>
                                    <td>
                                    @if($pendingMeeting->status == "PENDING")

                            
                                   
                                <a role="button" href="{{route('appMeeting', $pendingMeeting->id)}}" class="btn btn-icon btn-success"><i class="fa fa-16px fa-check"></i></a>
                                <a role="button" href="{{route('rejMeeting', $pendingMeeting->id)}}" class="btn btn-icon btn-danger"><i class="fa fa-16px fa-times"></i></a>
                               
                                    @elseif($pendingMeeting->status == "APPROVED")
                                 
                                    <span class="badge badge-pill badge-success">Approved</span>
                                     @elseif($pendingMeeting->status == "REJECTED")
                                     <span class="badge badge-pill badge-danger">Rejected</span>
                                    @endif

                                    </td>
                                   
                                    
                           
                                </tr>
                             
                                @php $index++; @endphp
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


{{-- </div> --}}

