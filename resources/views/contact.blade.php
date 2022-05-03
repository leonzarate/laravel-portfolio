@extends('layout')

@section('Title', 'Contact')
    
@section('content')
    <H1>@lang('Contact')</H1>

    <form method="POST" action="{{ route('message.store') }}">
        @csrf
        <input name="name" placeholder="Nombre..." value="{{ old('name') }}"><br>
        {!! $errors->first('name', '<small>:message</small><br>') !!}
        
            <input name="email" type="email" placeholder="Email..." value={{ old('email') }}><br>
        {!! $errors->first('email', '<small>:message</small><br>') !!}
        
            <input name="subject" placeholder="Asunto..." value="{{ old('subject') }}"><br>
        {!! $errors->first('subject', '<small>:message</small><br>') !!}
        
            <textarea name="content" placeholder="Mensaje...">{{ old('content') }}</textarea><br>
        {!! $errors->first('content', '<small>:message</small><br>') !!}
        
        <button>Enviar</button>
    </form>

@endsection