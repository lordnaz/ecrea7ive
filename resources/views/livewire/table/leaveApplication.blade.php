

<div class="col-lg-7 col-md-12 col-12 col-sm-12">

        <div class="card-header">
            <h4 class="section-title">Leave Application</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>


<div class="collapse show" id="mycard-collapse" style="">

<div class="card-body">
    <x-data-table2 :data="$data" :model="$leaveApplications">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Requester
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>

                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                Date Time
                    @include('components.sort-icon', ['field' => 'id'])
                </a>
                </th>
               
                <th>Action</th>


            </tr>
        </x-slot>
        <x-slot name="body">
        @foreach ($leaveApplications as $leaveApplication)
                <tr x-data="window.__controller.dataTableController({{ $leaveApplication->id }})">
                <td>{{ $leaveApplication->name }}</td>
                    <td>{{ $leaveApplication->id }}</td>
                 
                    <td class="whitespace-no-wrap row-action--icon">
                   

                    <a role="button" href="/leaves/edit_main/{{ $leaveApplication->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a class="btn btn-danger btn-action trigger--fire-modal-6"  title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>

              
                    </td>

                </tr>
            @endforeach
        </x-slot>
    </x-data-table2>
</div>

</div>
</div>



                               
                                


