@extends('layout')

@section('Title', "Editar proyecto")

@section('content')
    <H1>Editar proyecto</H1>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('projects.update', $project) }}">

        @method('PATCH')
 
        @include('projects._form', ['btnText' => 'Actualizar'])
        
    </form>
    
@endsection