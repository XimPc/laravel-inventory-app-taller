@extends('layout')
@section('title', 'Inventory App - Laravel - 2242742')
@section('encabezado', 'Lista de productos')
@section('content')
    <div class="text-center">
        <a href="{{ route('add.Products') }}" class="btn btn-success my-3">Anadir producto
        </a>

        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['cost'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ $product['brand']->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('product.Delete', ['id' => $product['id']]) }}" class="btn btn-danger"
                                data-id="{{ $product['id'] }}">Eliminar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('add.Products', ['id' => $product['id']]) }}" class="btn btn-warning"
                                data-id="{{ $product['id'] }}">Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
