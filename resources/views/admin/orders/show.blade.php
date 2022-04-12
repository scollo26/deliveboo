@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    {{ $order->totalPrice }} &euro;
                </h1>
                <p>
                    Ordine creato il: {{ $order->created_at }}
                </p>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantità</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plates as $plate)
                        <tr>
                            <td>{{$plate->name}}</td>
                            <td>{{$plate->price}}</td>
                            <td>{{$plate->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
