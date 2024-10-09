@extends('layout.adminLayout')

@section('title')
    Dashboard 
@endsection

@section('content')
    <div class="container-fluid">
        @include('components.admin.dashboard.bar')
        <div class="container-fluid">
           <div class="d-none recap">
                @include('components.admin.dashboard.recaps')
           </div>
            <div class="container-fluid">
                @include('components.admin.dashboard.recent')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        $(function() {

            $('#recentReservation').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

            getData();

            function getData() {
                $.ajax({
                    url: '/cms/loadedData',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const {
                            monthsData,
                            countReservations,
                        } = response;
                        $(".recap").removeClass('d-none');
                        displayMonthlyRecap(monthsData, countReservations)
                    },
                    error: function() {
                        getData();
                    }
                });
            }

            function displayMonthlyRecap(monthsData, countReservations) {
                $('.monthlyRecapTitle').text(
                    `${monthsData[0].monthLabel} - ${monthsData[monthsData.length - 1].monthLabel}`);
                var salesChartCanvas = $('#salesChart').get(0).getContext('2d');

                var salesChartData = {
                    labels: monthsData.map(list => list.monthName),
                    datasets: [{
                        label: 'All checkups',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: monthsData.map(list => list.sales),
                    }]
                };

                var salesChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                };

                new Chart(salesChartCanvas, {
                    type: 'line',
                    data: salesChartData,
                    options: salesChartOptions
                });

                $('.pendingReservation').find('b').text(countReservations.pending);
                $('.pendingReservation').find('span').text(`/${countReservations.total}`);
                const pendingBar = (countReservations.pending / countReservations.total) * 100;
                $('.pendingBar').css('width', `${pendingBar}%`);

                $('.inProgressReservation').find('b').text(countReservations.inProgress);
                $('.inProgressReservation').find('span').text(`/${countReservations.total}`);
                const reserveBar = (countReservations.inProgress / countReservations.total) * 100;
                $('.inProgressBar').css('width', `${reserveBar}%`);

                $('.doneReservation').find('b').text(countReservations.done);
                $('.doneReservation').find('span').text(`/${countReservations.total}`);
                const doneBar = (countReservations.done / countReservations.total) * 100;
                $('.doneBar').css('width', `${doneBar}%`);

                $('.cancelledReservation').find('b').text(countReservations.cancelled);
                $('.cancelledReservation').find('span').text(`/${countReservations.total}`);
                const canclledBar = (countReservations.cancelled / countReservations.total) * 100;
                $('.cancelledBar').css('width', `${canclledBar}%`);
            }
        })
    </script>
@endsection
