@extends('admin.index')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
{{-- Guardamos la ruta de subir imagen en una url --}}
<script>
    var uploadRoute = "{{ route('admin.images',  [app()->getLocale()]) }}";
</script>
{{-- Cargamos el dropzone --}}
<script src="{{ asset('js/dropzone.js') }}"></script>
{{-- Si el producto ya tiene imagen la cargamos al dropzone --}}
<script>
    // Agregar imagen existente al Dropzone
    var mockFile = { name: "{{ $product->image }}", size: {{ filesize(public_path('uploads/' . $product->image)) }}  };
    myDropzone.emit("addedfile", mockFile);
    myDropzone.emit("thumbnail", mockFile, "{{ asset('uploads/' . $product->image) }}");
    myDropzone.emit("complete", mockFile);
</script>
@endpush

<!-- Contenido -->
@section('title',  __('Edit') . " " . __('Product'))

@section('content')
<div class="page-body">
  <div class="container-xl">
      <div class="row row-deck row-cards">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.update', [app()->getLocale(), $product->id]) }}" enctype="multipart/form-data">
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