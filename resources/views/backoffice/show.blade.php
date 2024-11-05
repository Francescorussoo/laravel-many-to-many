@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>

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

    <a href="{{ route('admin.projects.index') }}">Torna alla lista progetti</a>
@endsection
