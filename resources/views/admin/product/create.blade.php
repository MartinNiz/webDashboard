@extends('admin.index')


<!-- Contenido -->
@section('title',  __('Create') . " " . __('Product'))


@section('content')

<div class="page-body">
  <div class="container-xl">
      <div class="row row-deck row-cards">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <form method="POST" action="{{ route('admin.products.store', [app()->getLocale()]) }}" id="ajaxForm" role="form" enctype="multipart/form-data">
                          @csrf
                          @include('admin.product.form')
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


@stop