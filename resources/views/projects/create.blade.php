@extends('layout')

@section('Title', "Crear proyecto")

@section('content')
    <H1>Crear nuevo proyecto</H1>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route ('projects.store') }}">

        @include('projects._form', ['btnText' => 'Guardar'])

    </form>
    
@endsection