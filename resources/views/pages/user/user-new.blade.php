<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Create New User') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">User</a></div>
            <div class="breadcrumb-item"><a href="#">New job</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="create-user" />
    </div>
</x-app-layout>
