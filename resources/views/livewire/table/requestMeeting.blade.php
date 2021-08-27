

<div class="col-lg-7 col-md-12 col-12 col-sm-12">

<div class="card-header">
    <h4 class="section-title">Meeting Request Status</h4>
    <div class="card-header-action">
        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
    </div>
</div>


<div class="collapse show" id="mycard-collapse" style="">

<div>
<x-data-table2 :data="$data" :model="$requestMeetings">
<x-slot name="head">
    <tr>
        <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            Requester Details
            @include('components.sort-icon', ['field' => 'id'])
        </a></th>

          <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            Description
            @include('components.sort-icon', ['field' => 'id'])
        </a></th>

        <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
        Date Time
            @include('components.sort-icon', ['field' => 'batch'])
        </a>
        </th>
       
        <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            Status
            @include('components.sort-icon', ['field' => 'id'])
        </a></th>


    </tr>
</x-slot>
<x-slot name="body">
@foreach ($requestMeetings as $requestMeeting)
        <tr x-data="window.__controller.dataTableController({{ $requestMeeting->id }})">


        </tr>
    @endforeach
</x-slot>
</x-data-table2>
</div>

</div>



