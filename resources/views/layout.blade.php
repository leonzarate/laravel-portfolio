<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('Title', "Valor por defecto")</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <script src="{{ mix('js/app.js')}}" defer></script>

</head>
    <body>
        @include('partials.nav')
        
        @include('partials.session-status')
        
        @yield('content')
    </body>
</html>