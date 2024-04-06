

@extends('admin.index')


<!-- Contenido -->
@section('title',  __('messages.Edit') . " " . __('messages.Product'))


@section('content')

<div class="page-body">
  <div class="container-xl">
      <div class="row row-deck row-cards">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.update', [app()->getLocale(), $product->id]) }}" role="form" enctype="multipart/form-data">
                        @method('PATCH')
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