@extends('layout')

@section('Title', "About")

@section('content')
    <H1>@lang('About')</H1>


    <strong>Database Connected: </strong>
    <?php
        try {
            \DB::connection()->getPDO();
            echo \DB::connection()->getDatabaseName();
            } catch (\Exception $e) {
            echo 'None';
        }
    ?>

@endsection