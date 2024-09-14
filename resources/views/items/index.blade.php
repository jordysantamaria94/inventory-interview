@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bold">Inventario</h2>
                            <a href="{{ route('items.create') }}" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Usuario</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>${{ number_format($item->precio, 2, ',', '.') }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('items.show', $item->id) }}"
                                                class="btn btn-warning btn-sm float-right ml-2">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if($item->user_id === Auth::id())
                                            <a href="{{ route('items.edit', $item->id) }}" disabled="true"
                                                class="btn btn-info btn-sm float-right ml-2">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->user_id === Auth::id())
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-right">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
