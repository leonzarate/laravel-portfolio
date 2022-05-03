@extends('layout')

@section('Title', "Portfolio")

@section('content')
    <H1>@lang('Projects')</H1>

    @auth
        <a href=" {{ route('projects.create') }} ">Crear Proyecto</a>
    @endauth
    
    <ul>
        @forelse ($projects as $project)
                <li>
                    {{-- 
                        $project, al indicar así, laravel infiere
                        $project->getRouteKey() => 1
                    --}}
                    <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a><br>
                    
                    <small>
                        Descripcion: {{ $project->description }}<br>
                        Creado el {{ $project->created_at->format('Y-m-d') }}<br>
                        Modificado {{ $project->updated_at->DiffForHumans() }}
                    </small>
                </li>
        @empty
            <li>No hay proyectos para mostrar</li>            
        @endforelse

        <br>
        <small>{{ $projects->onEachSide(3)->links() }}</small>
        {{--{{ $projects->render() }}--}}

    </ul>
@endsection