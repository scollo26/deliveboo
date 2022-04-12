@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col total_container">
                <h1>
                    {{ $user->name }}
                </h1>
                <h2>
                    Indirizzo: {{ $user->address }}
                </h2>
                <h3>
                    P.Iva: {{ $user->iva }}
                </h3>

                <p>
                    {{ $user->descrizione }}
                </p>
                <div class="images">
                    <div class="single_image">
                        <img src="{{ $user->logo_img }}" alt="{{ $user->name }}">
                    </div>
                    <div class="single_image">
                        <img src="{{ $user->banner_img }}" alt="{{ $user->descrizione }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style lang="scss" scoped>
    .total_container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .images {
        width: 80%;
        margin: 0 auto;
        display: flex;
        padding-top: 1em;
        align-items: center;
        justify-content: center;
    }

    .single_image {
        width: calc(100% / 3.5);
        height: 250px;
        margin: 0 3em
    }

    .single_image img {
        width: 100%;
        height: 100%
    }

    p {
        font-size: 2em;
        font-style: oblique;
    }

</style>
