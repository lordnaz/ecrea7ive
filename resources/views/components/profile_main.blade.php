<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Profile') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Task</a></div>
        <div class="breadcrumb-item"><a href="#">Profile</a></div>
        </div>
    </x-slot>

    <div>
        {{-- load component  --}}
        <x-profile></x-profile>
    </div>
</x-app-layout>



{{-- <script>
    $(document).ready(function () {
        $('.datepicker').daterangepicker({
            locale: {format: 'DD-MM-YYYY'},
            singleDatePicker: true,
        });

    });
    
</script> --}}
