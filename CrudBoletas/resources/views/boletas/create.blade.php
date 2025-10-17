@extends('layout')

@section('content')
<h2>Nueva Boleta</h2>

<form action="{{ route('boletas.store') }}" method="POST" class="mt-3">
  @csrf
  <div class="mb-3">
    <label>Número</label>
    <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" required>
  </div>

  <div class="mb-3">
    <label>Proveedor</label>
    <input type="text" name="proveedor" class="form-control" value="{{ old('proveedor') }}" required>
  </div>

  <div class="mb-3">
    <label>Monto</label>
    <input type="number" step="0.01" name="monto" class="form-control" value="{{ old('monto') }}" required>
  </div>

  <div class="mb-3">
    <label>Fecha</label>
    <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
  </div>

  <button type="submit" class="btn btn-success">Guardar</button>
  <a href="{{ route('boletas.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
