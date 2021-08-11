<div>
    <x-data-table :data="$data" :model="$migrations">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    TEST
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('migration')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'migration'])
                </a></th>
                <th><a wire:click.prevent="sortBy('batch')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'batch'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($migrations as $migration)
                <tr x-data="window.__controller.dataTableController({{ $migration->id }})">
                    <td>{{ $migration->id }}</td>
                    <td>{{ $migration->migration }}</td>
                    <td>{{ $migration->batch }}</td>
                    <td class="whitespace-no-wrap row-action--icon">

                        <x-jet-button class="ml-4">
                            {{ __('Login') }}
                        </x-jet-button>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
