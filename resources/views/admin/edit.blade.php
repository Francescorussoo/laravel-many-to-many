@extends('layouts.app')

@section('content')
    <form action="{{ route('backoffice.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <input type="text" name="title" value="{{ $project->title }}" required>
        <textarea name="description" required>{{ $project->description }}</textarea>

        <label for="image">Carica Nuova Immagine:</label>
        <input type="file" name="image">
        
        @if($project->image)
            <p>Immagine Attuale:</p>
            <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine del progetto" style="width: 150px;">
        @endif

        <label for="url">URL Progetto</label>
        <input type="text" name="url" value="{{ $project->url }}">

        <label for="type_id">Tipologia</label>
        <select name="type_id">
            <option value="">Seleziona una tipologia</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if($project->type_id == $type->id) selected @endif>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Aggiorna</button>
    </form>
@endsection
