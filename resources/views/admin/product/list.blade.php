@extends('admin.index')


<!-- Contenido -->
@section('title', __('messages.Products'))


@section('content')

  <div class="col-12">
    <div class="d-flex align-items-center justify-content-between">
      <div>
        Fitros
      </div>

      <div class="btn-list">
          <a href="{{ route('admin.products.create', [app()->getLocale()]) }}" class="btn btn-primary d-none d-sm-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <line x1="12" y1="5" x2="12" y2="19"/>
                  <line x1="5" y1="12" x2="19" y2="12"/>
              </svg>
              Create Product
          </a>
      </div>
    </div>

    <div class="table-responsive min-vh-100 mt-4">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <th></th>
            <th>{{ __('messages.No') }}</th>
            <th>{{ __('messages.Name') }}</th>
            <th>{{ __('messages.Description') }}</th>
            <th>{{ __('messages.Stock') }}</th>
            <th>{{ __('messages.Price') }}</th>
            <th>{{ __('messages.Action') }}</th>
          </thead>
          <tbody>
            @forelse ($products as $product)
                <tr>
                    <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select product"></td>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->descripcion }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                  {{ __('messages.Action') }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="{{ route('admin.products.edit', [app()->getLocale(), $product->id]) }}">
                                    Edit
                                  </a>
                                  <form action="{{ route('admin.products.destroy', [app()->getLocale(), $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="if(!confirm(__('messages.DeleteQuestion'))){return false;}" class="dropdown-item text-red"><i class="fa fa-fw fa-trash"></i>
                                      Delete
                                    </button>
                                  </form>
                                  {{-- <a class="dropdown-item"
                                    href="{{ route('products.show', [app()->getLocale(), $product->id]) }}">
                                      View
                                  </a> --}}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <td>No Data Found</td>
            @endforelse
            </tbody>
        </table>
    </div>
  </div>
  
@stop