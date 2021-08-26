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
        <x-job_tracker :messages="$post_data" :data="$ticket_collection" :ticket="$ticket_id"></x-job_tracker>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {

        var toolbarOptions = [
            // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'header': [1, 2, false] }],
            [{ 'font': [] }],
            ['bold', 'italic', 'underline'],        // toggled buttons
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            // ['blockquote'],
            // ['image', 'code-block']
            ['image'],
            // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            // [{ 'direction': 'rtl' }],                         // text direction

            // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            
            // [{ 'align': [] }],

            // ['clean']                                         // remove formatting button
        ];
        
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'What are you thinking...',
            theme: 'snow'
        });

    });
</script>
