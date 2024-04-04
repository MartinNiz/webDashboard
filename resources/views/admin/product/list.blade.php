@extends('admin.index')


<!-- Contenido -->
@section('title', 'Productos')


@section('content')
    

<a href="{{ route(Route::currentRouteName(), 'en') }}">English</a>
<a href="{{ route(Route::currentRouteName(), 'es') }}">Español</a>
@stop