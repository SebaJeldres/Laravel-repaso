@extends('layout')

@section('content')
<h2>Editar Boleta</h2>

<form action="{{ route('boletas.update', $boleta) }}" method="POST" class="mt-3">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label>Número</label>
    <input type="text" name="numero" class="form-control" value="{{ old('numero', $boleta->numero) }}" required>
  </div>

  <div class="mb-3">
    <label>Proveedor</label>
    <select class="form-select" name="proveedor" required>
      <option disabled>Selecciona un proveedor</option>
      @forelse($proveedors as $proveedor)
        <option value="{{ $proveedor->nombre }}" {{ $proveedor->nombre == old('proveedor', $boleta->proveedor) ? 'selected' : '' }}>
          {{ $proveedor->nombre }}
        </option>
      @empty
        <option value="">No hay proveedores disponibles</option>
      @endforelse
    </select>
  </div>

  <div class="mb-3">
    <label>Monto</label>
    <input type="number" step="0.01" name="monto" class="form-control" value="{{ old('monto', $boleta->monto) }}" required>
  </div>

  <div class="mb-3">
    <label>Fecha</label>
    <input type="date" name="fecha" class="form-control" value="{{ old('fecha', $boleta->fecha) }}" required>
  </div>

  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('boletas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
