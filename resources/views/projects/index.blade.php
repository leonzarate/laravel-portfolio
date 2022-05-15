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
            
        <div class="card" style="width: 18rem;">
            <img src="/storage/{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $project->title }}</h5>
              <p class="card-text">{{ $project->title }}</p>
              <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Ver mas</a>
            </div>
          </div>

                <li class="list-group-item border-0 mb-3 shadow-sm">
                    {{-- 
                        $project, al indicar así, laravel infiere
                        $project->getRouteKey() => 1
                    --}}
                    <a class="text-secondary text-decoration-none d-flex justify-content-between align-items-center" 
                        href="{{ route('projects.show', $project) }}">

                        @if($project->image)
                            <img src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
                        @endif

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

        {{-- <small>{{ $projects->/*onEachSide(3)->*/links() }}</small> --}}
        {{--{{ $projects->render() }}--}}
        <div class="pagination justify-content-center">
            {{ $projects->links() }}
        </div>
    </ul>

</div>


@endsection