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
                    Plates
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('admin.plates.create') }}" class="btn btn-dark mb-2">Add new plate</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Available</th>
                        <th colspan="3" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plates as $plate)
                        <tr id="{{ $plate->id }}">
                            <td>{{ $plate->id }}</td>
                            <td>{{ $plate->name }}</td>
                            <td>{{ $plate->price }} &euro;</td>
                            <td>{{ $plate->visible }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.plates.show', $plate->slug) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('admin.plates.edit', $plate->slug) }}">Edit</a>

                            </td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $plate->slug }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $plate->slug }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel{{ $plate->slug }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{ $plate->slug }}">Conferma cancellazione
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler cancellare questo piatto?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.plates.destroy', $plate->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit"
                                                        value="Delete">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">{{ $plates->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
