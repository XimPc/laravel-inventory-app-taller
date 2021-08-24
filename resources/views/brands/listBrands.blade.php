@extends('layout')
@section('title', 'Inventory App - Laravel - 2242742')
@section('encabezado', 'Lista de marcas')
@section('content')
    <div class="text-center">
        <a href="{{ route('brand.add') }}" class="btn btn-primary my-3">Anadir
        </a>

        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif

        <table class="table table-light table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <a href="{{ route('brand.Delete', ['id' => $brand->id]) }}" class="btn btn-danger"
                                data-id="{{ $brand['id'] }}">Eliminar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('brand.add', ['id' => $brand->id]) }}" class="btn btn-warning"
                                data-id="{{ $brand->id }}">Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
