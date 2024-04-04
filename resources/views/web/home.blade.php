@extends('layouts.app')

<!-- SEO -->
@section('title',  __('messages.webName'))
@section('descripcion',  __('messages.webDescription'))
@section('etiquetas',  __('messages.webName'))

<!-- Contenido -->
@section('content')
<h1>{{ __('messages.welcome') }}</h1>
<a href="{{ route(Route::currentRouteName(), 'en') }}">English</a>
<a href="{{ route(Route::currentRouteName(), 'es') }}">Español</a>
@stop