@extends('layout')

@section('Title', "Home")

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">
                <H1 class="display-4 text-primary">Desarrollo web</H1>
                <p class="lead text-secondary">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Nobis beatae voluptatum earum unde, rerum assumenda praesentium 
                    asperiores rem hic vero ducimus ut harum dicta, nam dolor. 
                    Reprehenderit nisi provident expedita.
                </p>

                <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Proyectos</a>

            </div>

            <div class="col-12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/home.svg" alt="Desarrollo Web">
            </div>

        </div>
    </div>    
@endsection

{{--
@extends('layouts.app')

@section('Title', "Home")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}