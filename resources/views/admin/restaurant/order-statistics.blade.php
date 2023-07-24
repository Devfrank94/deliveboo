@extends('layouts.admin')

@section('content')
    <div class="container m-3">
      <h2>Statistiche ordini</h2>
      <div class=" row-cols-6">
        <canvas id="orderStatisticsChart" style="width: 100%; heigth: 100%"></canvas>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            var data = @json($data);

            var ctx = document.getElementById('orderStatisticsChart').getContext('2d');
            var orderStatisticsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Ammontare vendite in €',
                        data: data.amounts,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
