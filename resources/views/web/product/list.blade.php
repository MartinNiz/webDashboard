@extends('layouts.app')

<!-- SEO -->
@section('title',  __('messages.webName'))
@section('descripcion',  __('messages.webDescription'))
@section('etiquetas',  __('messages.webName'))

<!-- Contenido -->
@section('content')
  <div class="container-fluid">
    <div class="row">
      @forelse ($products as $product)
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h4><a href="{{ route('web.product.detail', [app()->getLocale(), $product->id]) }}">{{ $product->nombre }}</a></h4>
            </div>
            <div class="card-body">
              <p>{{ $product->descripcion }}</p>
              <p>{{ $product->price }}</p>
            </div>
          </div>
        </div>
      @empty
        <h4>No Data Found</h4>
      @endforelse
    </div>
  </div>
@stop
