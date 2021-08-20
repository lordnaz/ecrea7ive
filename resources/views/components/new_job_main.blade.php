<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('New Job') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">New Job</a></div>
        </div>
    </x-slot>

    <div>
        {{-- load component  --}}
        <x-new_job></x-new_job>
    </div>
</x-app-layout>

<script>
    $(document).ready(function () {
        $('.datepicker').daterangepicker({
            locale: {format: 'DD-MM-YYYY'},
            singleDatePicker: true,
        });

    });
    
</script>
