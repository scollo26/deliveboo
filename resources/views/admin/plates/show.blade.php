@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- @if (session('status'))
    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
    @endif -->
        </div>
        <div class="row">
            <div class="col">
                <img class="img-fluid" src="{{ $plate->preview }}" alt="">
            </div>
            <div class="col">
                <h1>
                    {{ $plate->name }}
                </h1>
                <p>
                    {{ $plate->price }} &euro;
                </p>
                <h2>
                    {{ $plate->tag()->first()->name }}
                </h2>
                <p>
                    {{ $plate->description }}
                </p>
                <p>
                    {{ $plate->ingredients }}
                </p>
            </div>
        </div>
    </div>
@endsection
