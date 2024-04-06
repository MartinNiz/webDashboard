@extends('layouts.app')

<!-- SEO -->
@section('title',  __('Laravel'))
@section('descripcion',  __('Web Multi idoma'))
@section('etiquetas',  __('multiidioma, web, proyecto'))

<!-- Contenido -->
@section('content')
<div class="row">
  <div class="col-3 mx-auto">
    <div class="card">
      <div class="card-body">

        {{ __('Login') }}
        <form method="POST" action="/login">
          @csrf
          <div class="form-group">
            <label class="control-label" for="">{{ __('Email') }}</label>
            <input type="email" class="form-control" name="email">
          </div>

          <div class="form-group">
            <label class="control-label" for="">{{ __('Password') }}</label>
            <input type="password" class="form-control" name="password">
          </div>

          @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          <button type="submit">{{ __('Send') }}</button>

        </form>
        
      </div>
    </div>
  </div>
</div>
@stop