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
        <form action="">
          <div class="form-group">
            <label class="control-label" for="">Email</label>
            <input type="email" class="form-control">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop