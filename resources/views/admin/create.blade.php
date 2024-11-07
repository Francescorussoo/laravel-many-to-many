@extends('layouts.app')

@section('content')
    <form action="{{ route('backoffice.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Titolo" required>
        <textarea name="description" placeholder="Descrizione" required></textarea>
        
        <label for="image">Carica Immagine:</label>
        <input type="file" name="image">

        <label for="url">URL Progetto</label>
        <input type="text" name="url" placeholder="URL Progetto">
        
        <label for="type_id">Tipologia</label>
        <select name="type_id">
            <option value="">Seleziona una tipologia</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <button type="submit">Salva</button>
    </form>
@endsection
