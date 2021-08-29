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

        // alert(moment())

        // today
        var minDate = moment().add('days', 3)

        $('.datepicker').daterangepicker({
            locale: {format: 'YYYY-MM-DD'},
            singleDatePicker: true,
            minDate:minDate
        });

        $( "#job_status" ).on( "change", function() {
            var urgent = $('#job_status:checked').val()

            if(urgent == "on"){

                $('.datepicker').daterangepicker({
                    locale: {format: 'YYYY-MM-DD'},
                    singleDatePicker: true,
                    minDate:moment().add('days', 1),
                    startDate:moment().add('days', 1)
                });
            }else{
                $('.datepicker').daterangepicker({
                    locale: {format: 'YYYY-MM-DD'},
                    singleDatePicker: true,
                    minDate:moment().add('days', 3),
                    startDate:moment().add('days', 3)
                });
            }

        });


        $('#others_panel').hide();
        $("#others").prop('required',false);

        $('#job_name').on('change', function() {
            // alert( this.value );

            if(this.value == "Others"){
                $('#others_panel').show(500);
                $("#others").prop('required',true);
            }else{
                $('#others_panel').hide(500);
                $("#others").prop('required',false);
            }
        });

        // $("#job_name").change(function(){
        //     alert("The text has been changed.");
        // });

    });
    
</script>
