@php

// $user = auth()->user();

// $details = Post::post()->trix('content');

// if($message){
//     // var_dump($message);
// }

// $ticket_detail =  Auth::user()->usersdetail;

// var_dump($ticket_detail)

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
                    <div class="hero bg-light text-dark">
                        <div class="hero-inner">
                            <h2>Welcome</h2>
                            <p class="lead">Here is your ticket ID <i>{{ $ticket }}</i> for your references. Use below panel to update and communicate througout the whole processes.</p>
                            <div class="mt-4">
                                <a href="{{ route('new_job') }}" class="btn btn-outline-success btn-lg btn-icon icon-left"><i class="fas fa-plus-circle"></i>Create New Job</a>
                                <a href="{{ route('new_job') }}" class="btn btn-outline-danger btn-lg btn-icon icon-left" style="margin-left: 5px;"><i class="fas fa-minus-circle" ></i>Cancel This Job</a>
                            </div>
                        </div>
                    </div>

                        {{-- <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('assets/img/unsplash/login-bg.jpg');">
                            <div class="hero-inner">
                                <h2>Welcome, Nazrul Hanif!</h2>
                                <p class="lead">Here is your ticket ID <i>{{ $ticket }}</i> for your references. Use below panel to update and communicate througout the whole processes.</p>
                                <div class="mt-4">
                                    <a href="{{ route('new_job') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-plus-circle"></i>Create New Job</a>
                                </div>
                            </div>
                        </div> --}}
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
                    <div class="activity-detail border">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 1</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Job created</span>. Waiting for designer to accept.</p>
                        
                        <div class="ticket-divider"></div>
                        <div class="text-center">
                            <button class="btn btn-success">
                                Acknowledge
                            </button>
                        </div>
                        
                    </div>
                </div>

                <div class="activity">
                    <div class="activity-icon bg-secondary text-white shadow-secondary">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="activity-detail border">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 2</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Job acknowledge</span>. Designer preparing the artwork & design.</p>
                        
                        <div class="ticket-divider"></div>
                        <div class="form-group">
                            <label>Address</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="text-center" style="margin-top: 10px;">
                                <button class="btn btn-success">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="activity">
                    <div class="activity-icon bg-secondary text-white shadow-secondary">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="activity-detail border">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 3</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Approval</span>. Waiting for client approval.</p>

                        <div class="ticket-divider"></div>
                        <div class="text-center">
                            <button class="btn btn-success">
                                Approve
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="activity">
                    <div class="activity-icon bg-secondary text-white shadow-secondary">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="activity-detail border">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 4</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Delivery/Collection</span>. Design approved by client, now preparation task for final release.</p>

                        <div class="ticket-divider"></div>
                        <div class="text-center">
                            {{-- <button class="btn btn-danger">
                                Reject
                            </button> --}}
                            <button class="btn btn-success">
                                Received
                            </button>
                        </div>
                    </div>
                </div>

                <div class="activity">
                    <div class="activity-icon bg-secondary text-white shadow-secondary">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="activity-detail border">
                        <div class="mb-2">
                            <span class="text-job"><b>STEP 5</b></span>
                        </div>
                        <p><span class="text-primary font-weight-bold">Complete</span>. Order received and closed. Thank You!</p>
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
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->ticket_status }}" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Ticket ID</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $ticket }}" placeholder="Password">
                </div>
            </div>

            <div class="ticket-divider"></div>

            <h1 class="section-title">Job Details</h1>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Job Status</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->job_status }}" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Job Type</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $data->job_type }}" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Delivery Type</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->delivery_type }}" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Dateline</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->dateline }}" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">References (If any)</label>
                    <input type="text" readonly class="form-control-plaintext" value="{{ $data->references }}" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Description</label>
                    <textarea id="description" name="description" rows="3" class="form-control-plaintext" readonly placeholder="Description">{{ $data->description }}</textarea>
                </div>
            </div>

            <div class="ticket-divider"></div>

            <h1 class="section-title">Person In-Charge Details</h1>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Name</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->pic_name }}" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $data->pic_email }}" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="text-primary">Contact No</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputEmail4" value="{{ $data->pic_contact_no }}" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="text-primary">Office No</label>
                    <input type="text" readonly class="form-control-plaintext" id="inputPassword4" value="{{ $data->pic_office_no }}" placeholder="Password">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address" class="text-primary">Address</label>
                <textarea id="address" name="address" rows="3" class="form-control-plaintext" readonly placeholder="Address">{{ $data->pic_address }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="postcode" class="text-primary">Postcode</label>
                    <input type="text" readonly class="form-control-plaintext" id="postcode" value="{{ $data->pic_postcode }}" placeholder="Postcode">
                </div>
            </div>
            

            {{-- <div class="ticket-divider"></div> --}}

            

            <div class="card border-0 shadow-none">
                <div class="card-header">
                  <h4 class="section-title">Ticket Activities</h4>
                </div>
                <div class="card-body">

                    {{-- <form method="POST" action="{{ route('post_message') }}">
                        @csrf
                        @trix(\App\Post::class, 'content')
                        <input type="submit">
                    </form> --}}

                    {{-- @trix($post, 'content')

                    {!! $post->trix('content') !!}

                    {!! app('laravel-trix')->make($post, 'content') !!} --}}

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
                                    @if($message->field == 'content')
                                        {!! $message->content !!}
                                    @else
                                        {!! $message->content !!} <i>[System alert]</i>
                                    @endif
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