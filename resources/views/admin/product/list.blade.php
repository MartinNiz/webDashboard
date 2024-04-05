@extends('admin.index')


<!-- Contenido -->
@section('title', __('messages.Products'))


@section('content')
<a href="{{ route(Route::currentRouteName(), 'en') }}">English</a>
<a href="{{ route(Route::currentRouteName(), 'es') }}">Español</a>
@stop