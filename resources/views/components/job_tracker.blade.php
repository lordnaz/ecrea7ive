@php

// $user = auth()->user();

// $details = Post::post()->trix('content');

// if($message){
//     // var_dump($message);
// }

// $ticket_detail =  Auth::user()->usersdetail;

// var_dump($ticket_detail)

$role = strtoupper(auth()->user()->role);
// $uuid = auth()->user()->id;

@endphp

<div class="card">
    <div class="card-header">
      {{-- <h4 class="section-title">Ticket ID : GADJ172161731</h4> --}}
      <div class="container-fluid">
        <div class="row">
            {{-- <div class="col"> --}}
              {{-- <div class="alert col alert-primary font-weight-bold text-center">
                  Ticket ID : GADJ172161731
              </div> --}}

                <div class="col">
                    <div class="hero bg-whitesmoke text-dark border">
                        <div class="hero-inner">
                            <h2>Welcome</h2>
                            <p class="lead">Here is your ticket ID <i>{{ $ticket }}</i> for your references. Use below panel to update and communicate througout the whole processes.</p>
                            <div class="mt-4">
                                @if ($role == "USER")
                                    <a href="{{ route('new_job') }}" class="btn btn-outline-success btn-lg btn-icon icon-left">
                                        <i class="fas fa-plus-circle"></i>Create New Job
                                    </a>
                                @endif
                                @if ($data->ticket_status == "CREATED" && $role == "USER" && $data->active == 1)
                                    <a href="{{ route('cancel_job', $ticket) }}" class="btn btn-outline-danger btn-lg btn-icon icon-left" style="margin-left: 5px;">
                                        <i class="fas fa-minus-circle" ></i>Cancel This Job
                                    </a>
                                @endif
                                @if ($data->ticket_status == "CANCELLED" && $role == "ADMIN" && $data->active == 0)
                                    <a href="{{ route('reactivate', $ticket) }}" class="btn btn-outline-success btn-lg btn-icon icon-left" style="margin-left: 5px;">
                                        <i class="fas fa-plus-circle" ></i>Reactivate This Job
                                    </a>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" onclick="window.print()" class="btn btn-success icon-left btn-icon float-right"><i class="fas fa-file"></i> <span>Print Report</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

              
            {{-- </div> --}}
        </div>
      </div>
      
        
    </div>
    <div class="card-body">
      {{-- <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
        <i class="fas fa-list"></i> All Tickets
      </a> --}}
      <div class="tickets">
        <div class="ticket-items" id="ticket-items">
            <h1 class="section-title">Ticket Status</h1>
            <br>
            <div class="activities">
                <div class="activity">
                    <div class="activity-icon bg-danger text-white shadow-danger">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="activity-detail border bg-whitesmoke">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 1</b></span>
                        </div>
                        @if ($data->ticket_status == "CANCELLED")
                            <p><span class="text-primary font-weight-bold">Cancelled</span> by the Client. Please contact <span class="text-success">support@e-crea7ive.com</span> for reactivation.</p>
                        @else
                            <p><span class="text-primary font-weight-bold">Job Created</span>. The system has received your job request.</p>
                        @endif
                        
                        
                        @if ($data->ticket_status == "CREATED" && $role == "ADMIN" && $data->active == 1)
                            <div class="ticket-divider"></div>
                            <div class="text-center">
                                <a href="{{route('acknowledged', $data->ticket_id)}}" class="btn btn-success">
                                    Acknowledge job
                                </a>
                            </div>
                        @endif
                        
                    </div>
                </div>

                <div class="activity">
                    @if ($data->ticket_status == "CREATED" || $data->ticket_status == "CANCELLED")
                        <div class="activity-icon bg-secondary text-white shadow-secondary">
                            <i class="fas fa-bell"></i>
                        </div>
                    @else 
                        <div class="activity-icon bg-danger text-white shadow-danger">
                            <i class="fas fa-bell"></i>
                        </div>
                    @endif
                    
                    <div class="activity-detail border bg-whitesmoke">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 2</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Job in progress</span>. The designer is preparing the job request artwork.</p>
                        
                        <!-- <div class="ticket-divider"></div> -->
                        @if ($data->ticket_status == "ACKNOWLEDGE" && $role == "ADMIN" && $data->active == 1)
                            <div class="ticket-divider"></div>
                            <div class="text-center">
                                <a href="{{route('prepared', $data->ticket_id)}}" class="btn btn-success">
                                    Artwork Prepared
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="activity">
                    @if ($data->ticket_status == "REVIEW" || $data->ticket_status == "APPROVED" || $data->ticket_status == "RECEIVED" || $data->ticket_status == "CLOSED" || $data->ticket_status == "SENT")
                        <div class="activity-icon bg-danger text-white shadow-danger">
                            <i class="fas fa-bell"></i>
                        </div>
                    @else 
                        <div class="activity-icon bg-secondary text-white shadow-secondary">
                            <i class="fas fa-bell"></i>
                        </div>
                    @endif

                    <div class="activity-detail border bg-whitesmoke">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 3</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Waiting for approval</span>. Artwork is prepared & awaiting client approval.</p>

                        <!-- <div class="ticket-divider"></div> -->

                        @if ($data->ticket_status == "REVIEW" && $role == "USER" && $data->active == 1)
                            <div class="ticket-divider"></div>
                            <div class="text-center">
                                <a href="{{route('approved', $data->ticket_id)}}" class="btn btn-primary">
                                    Approve artwork
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                

                <div class="activity">
                    
                    @if ($data->ticket_status == "APPROVED" || $data->ticket_status == "RECEIVED" || $data->ticket_status == "CLOSED"|| $data->ticket_status == "SENT")
                        <div class="activity-icon bg-danger text-white shadow-danger">
                            <i class="fas fa-bell"></i>
                        </div>
                    @else 
                        <div class="activity-icon bg-secondary text-white shadow-secondary">
                            <i class="fas fa-bell"></i>
                        </div>
                    @endif
                    <div class="activity-detail border bg-whitesmoke">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 4</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Final artwork preparation/delivery</span>. The designer is preparing the final artwork to be sent to the client.</p>

                        <!-- <div class="ticket-divider"></div> -->
                        @if ($data->ticket_status == "APPROVED" && $role == "ADMIN" && $data->active == 1)
                            <div class="ticket-divider"></div>
                            <div class="text-center">
                                <a href="{{route('sent', $data->ticket_id)}}" class="btn btn-primary">
                                Final artwork sent 
                                </a>
                            </div>
                        @endif
                    </div>
                </div>




                <div class="activity">
                    @if ($data->ticket_status == "SENT" || $data->ticket_status == "RECEIVED" || $data->ticket_status == "CLOSED")
                        <div class="activity-icon bg-danger text-white shadow-danger">
                            <i class="fas fa-bell"></i>
                        </div>
                    @else 
                        <div class="activity-icon bg-secondary text-white shadow-secondary">
                            <i class="fas fa-bell"></i>
                        </div>
                    @endif
                    <div class="activity-detail border bg-whitesmoke">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 5</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Collection process</span>. Final artwork has been sent to the client.</p>

                        <!-- <div class="ticket-divider"></div> -->
                        @if ($data->ticket_status == "SENT" && $role == "USER" && $data->active == 1)
                            <div class="ticket-divider"></div>
                            <div class="text-center">
                                <a href="{{route('received', $data->ticket_id)}}" class="btn btn-primary">
                                    Job Received
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="activity">
                    @if ($data->ticket_status == "RECEIVED" || $data->ticket_status == "CLOSED")
                        <div class="activity-icon bg-danger text-white shadow-danger">
                            <i class="fas fa-bell"></i>
                        </div>
                    @else 
                        <div class="activity-icon bg-secondary text-white shadow-secondary">
                            <i class="fas fa-bell"></i>
                        </div>
                    @endif
                    <div class="activity-detail border bg-whitesmoke">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 6</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Job completed</span>. Job received by the client.</p>

                        <!-- <div class="ticket-divider"></div> -->
                        @if ($data->ticket_status == "RECEIVED" && $role == "ADMIN" && $data->active == 1)
                            <div class="ticket-divider"></div>
                            <div class="text-center">
                                <a href="{{route('closed', $data->ticket_id)}}" class="btn btn-success">
                                    Close Ticket
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ticket-content">
          <div class="ticket-header">
            <div class="ticket-sender-picture img-shadow">
              <img src="../assets/img/products/product-4-50.png" alt="image">
            </div>
            <div class="ticket-detail">
              <div class="ticket-title">
                <h4>Name : {{ $data->job_name }}</h4>
              </div>

              <div class="ticket-info">
                <i>created by &nbsp;</i><div class="font-weight-600">{{ auth()->user()->find($data->created_by)->name }}</div>
                {{-- <div class="bullet"></div> --}}
                <i>&nbsp;at &nbsp;</i><div class="text-primary font-weight-600">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y g:i:s a')}}</div>
              </div>
              {{-- <br>
              <span class="badge badge-pill badge-warning text-dark">{{ $ticket }}</span> --}}
            </div>
          </div>
          <div class="ticket-divider"></div>

          <div class="ticket-description">

            <h1 class="section-title">Ticket Information</h1>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Ticket Status</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->ticket_status }}">
                    <small class="text-muted">You can cancel job with CREATED ticket status</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Ticket ID</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $ticket }}">
                </div>
            </div>

            <div class="ticket-divider"></div>

            <h1 class="section-title">Job Details</h1>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Job Status</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->job_status }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Job Type</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $data->job_type }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Delivery Type</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->delivery_type }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Dateline</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->dateline }}">
                </div>
            </div>
            <div class="form-row">
                <!--<div class="form-group col-md-6">-->
                <!--    <label for="inputEmail4" class="text-primary">References (If any)</label>-->
                <!--    <input type="text" readonly class="form-control-plaintext" value="{{ $data->references }}" id="inputEmail4">-->
                <!--</div>-->
                <div class="form-group col-md-12">
                    <label for="inputPassword4" class="text-primary">Description</label>
                    <textarea id="description" name="description" rows="3" class="form-control-plaintext" readonly>{{ $data->description }}</textarea>
                </div>
            </div>

            <div class="ticket-divider"></div>

            <h1 class="section-title">Person In-Charge Details</h1>
            <br>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="text-primary">Company Name</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->pic_company_name }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Name</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->pic_name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $data->pic_email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Contact No</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->pic_contact_no }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Office No</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $data->pic_office_no }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address" class="text-primary">Address</label>
                <textarea id="address" name="address" rows="3" class="form-control-plaintext" readonly>{{ $data->pic_address }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="postcode" class="text-primary">Postcode</label>
                    <input type="text" readonly class="form-control-plaintext" id="postcode" value="{{ $data->pic_postcode }}">
                </div>
            </div>

            @if ($role == "ADMIN" && $data->active == 1 && $data->ticket_status != "RECEIVED")
                <div class="form-group">
                    <div class="control-label">If you wished to assign printing job to external.</div>
                    <label class="mt-2">
                        <input type="checkbox" id="printerSwitch" name="printerSwitch" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Assign to External Printer</span>
                    </label>
                </div>

                <div id="panel_printer">
                    
                    <h1 class="section-title">Printer Assignee</h1>
                    <br>

                    <form method="POST" action="{{ route('assign_printer', $data->ticket_id) }}">
                        @csrf

                        <div class="form-group col-md-6">
                            <label for="assignto" class="block text-sm font-medium text-gray-700">Assign to (Printer)</label>

                            <select id="printer_assign" name="printer_assign" class="form-control selectric">
                                <option value="" selected="true" disabled="">Select Printer</option>
                                @foreach($printers as $printer)
                                    <option value="{{ $printer->id }}" @if($printer->id == $data->printer) selected @endif>{{ $printer->name }}</option>
                                @endforeach
                            </select>

                            <div class="text-right" style="margin-top: 15px; margin-bottom: 15px;">
                                <button type="submit" class="btn btn-warning text-dark">
                                    Assign
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="ticket-divider"></div>
                </div>
            @endif
            
            @if ($role != "PRINTER")
            <small class="text-danger">*Please Note: Make sure no confidential information after job has been assigned to external printer.</small>
            @endif
            
            {{-- <div class="ticket-divider"></div> --}}

            <div class="card border-0 shadow-none">
                <div class="card-header">
                  <h4 class="section-title">Comment Section</h4>
                </div>
                <div class="card-body">

                    @if ($role == "ADMIN" || $role == "SUPERADMIN")
                    <small class="text-danger">*Please ensure any artwork attached has been <b>Watermarked</b>.</small>
                    @endif
                    
                    @if ($data->active == 1)
                        <form method="POST" action="{{ route('post_message') }}">
                            @csrf
                            <input type="text" class="form-control" name="post_ticket_id" value="{{ $ticket }}" hidden>

                            @trix(\App\Post::class, 'content', [ 'hideTools' => ['block-tools'] ])

                            <div class="form-group text-right" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-primary">
                                    Reply
                                </button>
                            </div>
                        </form>

                    @else
                        <div class="alert alert-light">
                            Communication are BLOCKED once the ticket has been <b>CLOSED/CANCELLED</b>
                        </div>
                    @endif
                    

                    @if ($role != "PRINTER")
                    <small class="text-danger">*Please ensure <b>Approved PR is Attached</b> for our references.</small>
                    @endif
                    <div class="ticket-divider"></div>

                  <ul class="list-unstyled list-unstyled-border" style="margin-top: 15px;">
                      

                    @foreach ($messages as $message)

                        <li class="media">
                            @if ($message->role == 'user')
                                <img class="mr-3 rounded-circle" width="30" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                            @elseif($message->role == 'printer')
                                <img class="mr-3 rounded-circle" width="30" src="../assets/img/avatar/avatar-4.png" alt="avatar">
                            @else
                                <img class="mr-3 rounded-circle" width="30" src="../assets/img/avatar/avatar-2.png" alt="avatar">
                            @endif
                            <div class="media-body">
                                <div class="float-right text-primary"><i class="text-small text-muted">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</i></div>
                                <div class="media-title">{{ $message->poster_name }}</div>
                                <span class="text-small text-muted">
                                    {!! $message->content !!}
                                </span>
                            </div>
                        </li>
                        
                    @endforeach

                    
                  </ul>

                  {{-- <div class="ticket-divider"></div> --}}

                </div>
              </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
