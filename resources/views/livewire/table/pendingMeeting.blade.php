<div class="card col-lg-12 col-md-12">
        <div class="card-header">
            <h4 class="section-title">Booked Time Slot</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>


<div class="collapse show" id="mycard-collapse" style="">

<div>
    <x-data-table2 :data="$data" :model="$pendingMeetings">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    Requester
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('migration')" role="button" href="#">
                    Department
                    @include('components.sort-icon', ['field' => 'migration'])
                </a></th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                    Description
                    @include('components.sort-icon', ['field' => 'batch'])
                </a></th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Time Start
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Time End
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>



            </tr>
        </x-slot>
        <x-slot name="body">
        @foreach ($pendingMeetings as $pendingMeeting)
                <tr x-data="window.__controller.dataTableController({{ $pendingMeeting->id }})">


                </tr>
            @endforeach
        </x-slot>
    </x-data-table2>
</div>

</div>

</div>


<div class="card col-lg-12 col-md-12">
        <div class="card-header">
            <h4 class="section-title">Pending Request Time Slot</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>


<div class="collapse show" id="mycard-collapse2" style="">


<div>
    <x-data-table2 :data="$data" :model="$pendingMeetings">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    Requester
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('migration')" role="button" href="#">
                    Department
                    @include('components.sort-icon', ['field' => 'migration'])
                </a></th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                    Description
                    @include('components.sort-icon', ['field' => 'batch'])
                </a></th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Time Start
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Time End
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>
               
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Action
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>


            </tr>
        </x-slot>
        <x-slot name="body">
        @foreach ($pendingMeetings as $pendingMeeting)
                <tr x-data="window.__controller.dataTableController({{ $pendingMeeting->id }})">

                </tr>
            @endforeach
        </x-slot>
    </x-data-table2>
</div>
</div>
</div>