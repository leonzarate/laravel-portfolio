@extends('layout')

@section('Title', "Portfolio")

@section('content')


<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        
        @isset($category)
            <div>
                <H1 class="display-4 mb-0">{{ $category->name }}</H1>
                <a href="{{ route('projects.index') }}">Regresar a los proyectos</a>
            </div>
        @else
            <H1 class="display-4 mb-0">@lang('Projects')</H1>    
        @endisset
        
        
        @can('create', $newProject)
            <a class="btn btn-primary" href=" {{ route('projects.create') }} ">
                Crear Proyecto
            </a>
        @endcan

    </div>

    <p class="lead text-secondary">
        Proyectos realizados Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Recusandae, veritatis amet officia magnam exercitationem doloribus asperiores. 
    </p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($projects as $project)

            <div class="col">
                <div class="card h-100">
                    
                    @if($project->image)
                        <img src="/storage/{{ $project->image }}" 
                            class="card-img-top"
                            style="height: 150px; object-fit: cover" 
                            alt="{{ $project->title }}"
                        >
                    @endif

                    <div class="card-body">
                        <h5 class="card-text">{{ $project->title }}</h5>
                        <p class="card-text text-truncate">{{ $project->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm">Ver mas...</a>
                            @if($project->category_id)
                                <a 
                                href="{{ route('categories.show', $project->category) }}">
                                {{ $project->category->name }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Ultima actualización {{ $project->updated_at->DiffForHumans()}}</small>
                    </div>
                </div>
            </div>

        @empty

            <div class="card">
                No hay proyectos para mostrar
            </div>            
        
        @endforelse

        <br>

        {{-- <small>{{ $projects->/*onEachSide(3)->*/links() }}</small> --}}
        {{--{{ $projects->render() }}--}}
        <ul class="pagination justify-content-center">
            {{ $projects->links() }}
        </ul>
    </div>

    <br>

    @can('view-deleted-projects')
        <h4>Papelera</h4>
        <ul class="list-group">
            @foreach ($deletedProjects as $deletedProject)
                <li class="list-group-item">
                    {{ $deletedProject->title }}
                    @can('restore', $deletedProject)
                        <form method="POST" action="{{ route('projects.restore', $deletedProject) }}" class="d-inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-info">Restaurar</button>
                        </form>                                                
                    @endcan

                    @can('forceDelete', $deletedProject)
                        <form method="POST" 
                            onsubmit="return confirm('Esta acción no se puede deshacer, ¿Estás seguro de querer eliminar éste proyecto?')" 
                            action="{{ route('projects.forceDelete', $deletedProject) }}" 
                            class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar permanentemente</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    @endcan

@endsection