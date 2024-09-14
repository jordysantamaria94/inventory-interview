@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Item</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $item->nombre }}</h5>
                <p class="card-text">{{ $item->descripcion }}</p>
                <p class="card-text">Cantidad: {{ $item->cantidad }}</p>
                <p class="card-text">Precio: {{ $item->precio }}</p>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
