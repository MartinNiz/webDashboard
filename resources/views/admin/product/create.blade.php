@extends('admin.index')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    var uploadRoute = "{{ route('admin.images') }}";
</script>
<script src="{{ asset('js/dropzone.js') }}"></script>
@endpush

<!-- Contenido -->
@section('title',  __('Create') . " " . __('Product'))

@section('content')

<div class="page-body">
  <div class="container-xl">
      <div class="row row-deck row-cards">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <form method="POST" action="{{ route('admin.products.store', [app()->getLocale()]) }}" enctype="multipart/form-data">
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