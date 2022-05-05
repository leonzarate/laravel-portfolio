@extends('layout')

@section('Title', 'Contact')
    
@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            <form class="bg-white shadow rounded py-3 px-3" method="POST" action="{{ route('message.store') }}">
                @csrf
                
                <H1 class="display-4 text-black-75">@lang('Contact')</H1>

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control bg-light sahdow-sm @error('name') is-invalid @else border-0 @enderror"
                        id="name" 
                        name="name" 
                        placeholder="Nombre..." 
                        value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{--!! $errors->first('name', '<small>:message</small><br>') !!--}}
                </div>
        
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input class="form-control bg-light sahdow-sm @error('email') is-invalid @else border-0 @enderror"
                        id="email" 
                        name="email" 
                        placeholder="Correo electrónico..." 
                        value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{--!! $errors->first('name', '<small>:message</small><br>') !!--}}
                </div>
                
                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input class="form-control bg-light sahdow-sm @error('subject') is-invalid @else border-0 @enderror"
                        id="subject" 
                        name="subject" 
                        placeholder="Asunto..." 
                        value="{{ old('subject') }}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{--!! $errors->first('name', '<small>:message</small><br>') !!--}}
                </div>
        
                <div class="form-group">
                    <label for="content">Mensaje</label>
                    <input class="form-control bg-light sahdow-sm @error('content') is-invalid @else border-0 @enderror"
                        id="content" 
                        name="content" 
                        placeholder="Mensaje..."
                        value="{{ old('content') }}">
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {{--!! $errors->first('name', '<small>:message</small><br>') !!--}}
                </div>
                
                <div class="form-group">
                    <div class="d-grid gap-2 d-lg-block">
                        <button class="btn btn-primary w-100">
                            @lang('Send')
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>
@endsection