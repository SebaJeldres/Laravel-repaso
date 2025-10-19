@extends('layout')

@section('content')
<h2>Nueva Proveedor</h2>

<form action="{{ route('proveedor.store') }}" method="POST" class="mt-3">
  @csrf
  <div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
  </div>

  <div class="mb-3">
    <label>Direccion</label>
    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" required>
  </div>

  <div class="mb-3">
    <label>Telefono</label>
    <input type="string" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
  </div>

  <div class="mb-3">
    <label>Supervisor</label>
    <input type="text" name="supervisor" class="form-control" value="{{ old('supervisor') }}" required>
  </div>

  <button type="submit" class="btn btn-success">Guardar</button>
  <a href="{{ route('boletas.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
