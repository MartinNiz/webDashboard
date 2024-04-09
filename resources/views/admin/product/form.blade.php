
<div class="form-group mb-3">
  <label class="form-label">{{ __('Name') }}</label>
  <div>
    <input type="text" name="nombre" value="{{ $product->nombre }}" class="form-control">
    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
  </div>
</div>

<div class="form-group mb-3">
  <label class="form-label">{{ __('Description') }}</label>
  <div>
    <textarea type="text" name="descripcion" class="form-control" >{{ $product->descripcion }}</textarea>
    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
  </div>
</div>
<div class="form-group mb-3">
  <label class="form-label">{{ __('Stock') }}</label>
  <div>
    <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
    {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
  </div>
</div>
<div class="form-group mb-3">
  <label class="form-label">{{ __('Price') }}</label>
  <div>
    <input type="number" name="price" step="0.1"  value="{{ $product->price }}" class="form-control">
    {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
  </div>
</div>

<div class="form-group mb-3">
  <label class="form-label">{{ __('Images gallery') }}</label>
  <div id="image-gallery" class="dropzone">
    <div class="dz-message" data-dz-message><span>{{ __("Add images to gallery") }}</span></div>
  </div>
</div>

<input type="hidden" name="image" value="{{ $product->image }}">
<input type="hidden" id="product_id" value="{{ $product->id }}">

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('admin.products.index' , [app()->getLocale()]) }}" class="btn btn-danger">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>