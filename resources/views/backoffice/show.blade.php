@extends('layouts.app')

@section('title', 'Dettagli Progetto')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>

    @if($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine progetto" style="width: 200px;">
    @endif

    @if($project->type)
        <p><strong>Tipologia:</strong> {{ $project->type->name }}</p>
    @endif

    @if($project->technologies->isNotEmpty())
        <p><strong>Tecnologie:</strong></p>
        <ul>
            @foreach($project->technologies as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach
        </ul>
    @else
        <p><em>Nessuna tecnologia associata</em></p>
    @endif

    <p><strong>URL Progetto:</strong> <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a></p>

    <a href="{{ route('backoffice.projects.index') }}">Torna alla lista progetti</a>
@endsection
