@extends('layout')

@section('Title', 'Portafolio | ' . $project->title)

@section('content')

    <h1>{{ $project->title}}</h1>

    @auth
        <a href="{{ route('projects.edit', $project)}}" >Editar</a> 
    @endauth

    @auth
        <form method="POST" action="{{ route('projects.destroy', $project)}}">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    @endauth

    <p>{{ $project->description}}</p>
    <p>{{ $project->updated_at->DiffForHumans()}}</p>

@endsection
