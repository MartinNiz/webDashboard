@extends('layouts.app')

<!-- SEO -->
@section('title',  __('messages.webName'))
@section('descripcion',  __('messages.webDescription'))
@section('etiquetas',  __('messages.webName'))

<!-- Contenido -->
@section('content')
<div class="row">
  <div class="col-3 mx-auto">
    <div class="card">
      <div class="card-body">

        {{ __('messages.Login') }}
        <form method="POST" action="/login">
          @csrf
          <div class="form-group">
            <label class="control-label" for="">{{ __('messages.Email') }}</label>
            <input type="email" class="form-control" name="email">
          </div>

          <div class="form-group">
            <label class="control-label" for="">{{ __('messages.Password') }}</label>
            <input type="password" class="form-control" name="password">
          </div>

          @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          <button type="submit">{{ __('messages.Send') }}</button>

        </form>
        
      </div>
    </div>
  </div>
</div>
@stop