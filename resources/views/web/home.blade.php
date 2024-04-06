@extends('layouts.app')

<!-- SEO -->
@section('title',  __('Laravel'))
@section('descripcion',  __('Web Multi idoma'))
@section('etiquetas',  __('multiidioma, web, proyecto'))

<!-- Contenido -->
@section('content')
<h1>{{ __('welcome') }}</h1>
<a href="{{ route(Route::currentRouteName(), 'en') }}">English</a>
<a href="{{ route(Route::currentRouteName(), 'es') }}">Español</a>
@stop