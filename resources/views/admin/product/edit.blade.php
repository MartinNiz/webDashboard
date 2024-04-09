@extends('admin.index')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
{{-- Guardamos la ruta de subir imagen en una url --}}
<script>
    var uploadRoute = "{{ route('admin.images.store',  [app()->getLocale()]) }}";
    var deleteRoute = "{{ route('admin.images.destroy',  [app()->getLocale()]) }}";
</script>
{{-- Cargamos el dropzone --}}
<script src="{{ asset('js/dropzone.js') }}"></script>
{{-- Si el producto ya tiene imagen la cargamos al dropzone --}}
@if(sizeof($product->images)>0)
    @foreach ($product->images as $image)
        <script>
            var mockFile = { name: "{{ $image->path }}", size: {{ filesize(public_path('uploads/' . $image->path)) }}  };
            myDropzone.emit("addedfile", mockFile);
            myDropzone.emit("thumbnail", mockFile, "{{ asset('uploads/' . $image->path) }}");
            myDropzone.emit("complete", mockFile);
        </script>
    @endforeach
@endif
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