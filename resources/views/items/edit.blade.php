@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="fw-bold">Actualizar</h2>
                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control"
                                    value="{{ $item->nombre }}" required>
                            </div>
                            <div class="form-group mt-4">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $item->descripcion }}</textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control"
                                    value="{{ $item->cantidad }}" required>
                            </div>
                            <div class="form-group mt-4">
                                <label for="precio">Precio</label>
                                <input type="number" step="0.01" name="precio" id="precio" class="form-control"
                                    value="{{ $item->precio }}" required>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
