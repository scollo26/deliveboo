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
                    Edit Plate
                </h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.plates.update', $plate) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <select class="form-select" name="tag_id">
                        <option value="">Select a tag</option>
                        @foreach ($tags as $tag)
                            <option @if (old('tag_id', $plate->tag_id) == $tag->id) selected @endif value="{{ $tag->id }}">
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
                    <input type="text" class="form-control" id="name" name="name" value=" {{ old('name', $plate->name) }}">
                    @error('name')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!--Descrizione piatto-->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"> {{ old('description', $plate->description) }}</textarea>
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
                        <input type="number" class="form-control" aria-label="Amount (to the nearest euro)" step="0.01" value="{{ old('price', $plate->price) }}" name="price" id="price">
                    </div>
                </div>

                <!--Ingredienti piatto-->
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <textarea class="form-control" id="ingredients" rows="3" name="ingredients"> {{ old('ingredients', $plate->ingredients) }}</textarea>
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
                 
                <!-- Anteprima immagine di preview -->
                @if (!empty($plate->preview))
                    <div class="mb-3">
                        <img class="w-50" src="{{ asset('storage/' . $plate->preview) }}" alt="{{ $plate->name }}">
                    </div>
                @endif


                <!-- Upload immagine di preview -->
                <div class="mb-3">
                    <label for="preview" class="form-label">Preview</label>
                    <input class="form-control" type="file" id="preview" name="preview">
                    @error('preview')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>
@endsection