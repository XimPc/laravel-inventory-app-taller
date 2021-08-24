@extends('layout')
@section('title', 'Inventory App - Laravel - 2242742')
@section('encabezado', 'Lista de categorias')
@section('content')

    <div class="text-center">
        <a href="{{ route('category.add') }}" class="btn btn-primary my-3">Anadir categoria
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
                    <th>Descripción</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('category.add', ['id' => $category->id]) }}" class="btn btn-warning"
                                data-id="{{ $category->id }}">Editar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger"
                                data-id="{{ $category['id'] }}">Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
