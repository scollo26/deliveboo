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
                    Create New Plates
                </h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.plates.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <select required class="form-select" name="tag_id">
                        <option value>Select a tag</option>
                        @foreach ($tags as $tag)
                            <option @if (old('tag_id') == $tag->id) selected @endif value="{{ $tag->id }}">
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tag_id')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('tags.*')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <!--Nome piatto-->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id=" name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus name="name">
                    @error('name')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!--Descrizione piatto-->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id=" description" rows="3"
                        name="description"> </textarea>
                    @error('description')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!--Prezzo piatto-->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">&euro;</span>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                            aria-label="Amount (to the nearest euro)" step="0.01" value="{{ old('price') }}" name="price"
                            id="price" required autocomplete="price" autofocus>
                    </div>
                </div>

                <!--Ingredienti piatto-->
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" rows="3" name="ingredients"
                        required autocomplete="ingredients" autofocus> {{ old('ingredients') }}</textarea>
                    @error('ingredients')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!--Visibilità-->
                <div class="mb-3">
                    <label for="visible" class="form-label">Visible</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visible" value="1" checked>
                        <label class="form-check-label" for="visible">
                            Visibile
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visible" value="0">
                        <label class="form-check-label" for="visible">
                            Non visibile
                        </label>
                    </div>
                </div>
                <!--Upload immagine di preview-->

                <div class="mb-3">
                    <label for="preview" class="form-label">Preview</label>
                    <input class="form-control" type="file" id="preview" name="preview">
                </div>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>
@endsection
