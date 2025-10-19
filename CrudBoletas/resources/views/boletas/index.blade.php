@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Listado de Boletas</h2>
  <a href="{{ route('boletas.create') }}" class="btn btn-primary">Nueva Boleta</a>
  <a href="{{ route('proveedor.create') }}" class="btn btn-primary">Nuevo proveedor</a>
</div>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Número</th>
      <th>Proveedor</th>
      <th>Monto</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($boletas as $boleta)
    <tr>
      <td>{{ $boleta->id }}</td>
      <td>{{ $boleta->numero }}</td>
      <td>{{ $boleta->proveedor }}</td>
      <td>${{ number_format($boleta->monto, 0, ',', '.') }}</td>
      <td>{{ $boleta->fecha }}</td>
      <td>
        <a href="{{ route('boletas.edit', $boleta) }}" class="btn btn-sm btn-warning">Editar</a>
        <form action="{{ route('boletas.destroy', $boleta) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta boleta?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center">No hay boletas registradas.</td></tr>
    @endforelse
  </tbody>
</table>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>email</th>
      <th>Supervisor</th>
    </tr>
  </thead>
  <tbody>
    @forelse($proveedors as $proveedor)
    <tr>
      <td>{{ $proveedor->id }}</td>
      <td>{{ $proveedor->nombre }}</td>
      <td>{{ $proveedor->direccion }}</td>
      <td>{{ $proveedor->telefono}}</td>
      <td>{{ $proveedor->email }}</td>
      <td>{{ $proveedor->supervisor }}</td>
      <td>
        <a href="{{ route('proveedor.edit', $proveedor) }}" class="btn btn-sm btn-warning">Editar</a>
        <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center">No hay proveedores registrados.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
