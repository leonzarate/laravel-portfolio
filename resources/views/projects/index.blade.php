@extends('layout')

@section('Title', "Portfolio")

@section('content')


<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <H1 class="display-4 mb-0">@lang('Projects')</H1>

        @auth
            <a class="btn btn-primary" href=" {{ route('projects.create') }} ">
                Crear Proyecto
            </a>
        @endauth
    </div>

    <p class="lead text-secondary">
        Proyectos realizados Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Recusandae, veritatis amet officia magnam exercitationem doloribus asperiores. 
    </p>

    <ul class="list-group">
        @forelse ($projects as $project)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    {{-- 
                        $project, al indicar así, laravel infiere
                        $project->getRouteKey() => 1
                    --}}
                    <a class="text-secondary text-decoration-none d-flex justify-content-between align-items-center" href="{{ route('projects.show', $project) }}">
                        <span class="font-weight-bold">
                            {{ $project->title }}
                        </span>
                  
                        {{--Descripcion: {{ $project->description }}<br>--}}
                        <span class="text-black-50">
                            {{ $project->created_at->format('Y-m-d') }}<br>
                            {{--Modificado {{ $project->updated_at->DiffForHumans() }}--}}
                        </span>
                    </a>
                </li>
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay proyectos para mostrar
            </li>            
        @endforelse

        <br>
        <small>{{ $projects->/*onEachSide(3)->*/links() }}</small>
        {{--{{ $projects->render() }}--}}

    </ul>
</div>


@endsection