@extends('layouts.admin')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="row p-4 ">
        <div class="col-6">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <div class="card-title">
                       <h5 class="card-title">Latest plates added</h5>
                       <div class="card-text">
                           Questa è una lista degli ultimi piatti inseriti
                       </div>
                        <ul class="list-group list-group-flush">
                            @foreach($plates as $plate)
                                <li class="list-group-item">{{ $plate->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('images/orders.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <div class="card-title">
                       <h5 class="card-title">Latest orders received</h5>
                       <div class="card-text">
                           Questa è una lista degli ultimi ordini ricevuti
                       </div>
                        <ul class="list-group list-group-flush">
                            @foreach($orders as $order)
                                <li class="list-group-item">Prezzo totale:{{ $order->totalPrice }} &euro;  Ordine creato il:{{ $order->created_at }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Prenotazioni
                </div>
                <div class="card-body">
                    <canvas id="myChart1" width="100%" height="40"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart1').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto' , 'settembre' , 'ottobre', 'dicembre'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3, 12, 5, 12, 10, 11, 1],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1,
                                    fill: true,
                                    tension: 0.4

                                }]
                            },
                            options: {
                                plugins: {
                                    legend: {
                                        display: false
                                        }
                                    },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
