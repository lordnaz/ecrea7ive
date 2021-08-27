<div class="card col-lg-12 col-md-12">
        <div class="card-header">
            <h4 class="section-title">Total Stock (List)</h4>
            <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-minus"></i></a>
            </div>
        </div>


<div class="collapse show" id="mycard-collapse" style="">

<div>
    <x-data-table2 :data="$data" :model="$inventorys">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>

                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Item Name/Type
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Quantity
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                Last Updated
                    @include('components.sort-icon', ['field' => 'batch'])
                </a>
                </th>
                <th>Action</th>


            </tr>
        </x-slot>
        <x-slot name="body">
        @foreach ($inventorys as $inventory)
                <tr x-data="window.__controller.dataTableController({{ $inventory->id }})">


                </tr>
            @endforeach
        </x-slot>
    </x-data-table2>
</div>

</div>

</div>


