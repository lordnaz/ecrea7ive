<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Job Ticket') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Job Details</a></div>
        <div class="breadcrumb-item"><a href="{{ route('tracker') }}">Job Tracker</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:create-manpower/> --}}
        {{-- <x-edit-manpower :data="$data"></x-edit-manpower> --}}
        <x-job_tracker></x-job_tracker>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    });
</script>
