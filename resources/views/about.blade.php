@extends('layout')

@section('Title', "About")

@section('content')

<div class="container">
    <div class="row">

        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="/img/about.svg" alt="Desarrollo Web">
        </div>

        <div class="col-12 col-lg-6">
            <H1 class="display-4 text-primary">Quienes somos</H1>
            <p class="lead text-secondary">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Nobis beatae voluptatum earum unde, rerum assumenda praesentium 
                asperiores rem hic vero ducimus ut harum dicta, nam dolor. 
                Reprehenderit nisi provident expedita.
            </p>

            <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Proyectos</a>

        </div>

    </div>
</div>  


@endsection

{{--<strong>Database Connected: </strong>--}}

<?php
/*
    try {
        \DB::connection()->getPDO();
        echo \DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
        echo 'None';
    }
*/
?>