
<x-app-layout>
    <x-slot name="header_content">
        <h1>Stock Reporting</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Stock Reporting</div>
        </div>
    </x-slot>
    <div>
        <x-transaction-graph :costing="$costing"></x-transaction-graph>
    </div>
    <div>
        <x-transaction-table :datas="$datas"></x-transaction-table>
    </div>
</x-app-layout>

<script>

$(document).ready(function () {

    $("#tables").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });

    $('.daterange-btn').daterangepicker({
        locale: {format: 'MMMM D, YYYY'},
        ranges: {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
    }, function (start, end) {
        $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        $('#date_chosen').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        $('#date_chosen_copy').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    });


    var costs = {!! json_encode($costing) !!};

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
        label: 'Statistics',
        data: [costs.jan, costs.feb, costs.mar, costs.apr, costs.may, costs.jun, costs.jul, costs.aug, costs.sep, costs.oct, costs.nov, costs.dec],
        borderWidth: 2,
        backgroundColor: 'rgba(254, 220, 0, .2)',
        borderWidth: 2.5,
        borderColor: '#fedc00',
        pointBorderWidth: 0 ,
        pointRadius: 3.5,
        pointBackgroundColor: '#28a745',
        pointBorderColor: '#28a745',
        pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
        }]
    },
    options: {
        legend: {
        display: false
        },
        scales: {
        yAxes: [{
            gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
            },
            ticks: {
            beginAtZero: true,
            stepSize: 50,
            callback: function(value, index, values) {
                return '$' + value;
            }
            }
        }],
        xAxes: [{
            gridLines: {
            display: false,
            tickMarkLength: 15,
            }
        }]
        },
    }
    });


    
});


</script>

