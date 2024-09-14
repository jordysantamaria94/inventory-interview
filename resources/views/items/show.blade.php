@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><span class="fw-bold">{{ $item->nombre }}</span></h2>
                        <p class="card-text">
                            <span class="fw-bold">Descripción:</span> {{ $item->descripcion }}
                        </p>
                        <p class="card-text">
                            <span class="fw-bold">Cantidad:</span> {{ $item->cantidad }}
                        </p>
                        <p class="card-text">
                            <span class="fw-bold">Precio:</span> ${{ number_format($item->precio, 2, ',', '.') }}
                        </p>
                        @if ($item->user_id === Auth::id())
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                style="display:inline; margin-left: 6px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
