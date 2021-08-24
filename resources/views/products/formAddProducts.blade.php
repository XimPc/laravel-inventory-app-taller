@extends('layout')
@section('title', 'Add products - Inventory App')
@section('encabezado', $product->id ? 'Actualizar producto' : 'Agregar producto')
@section('content')
    <form class="row g-3 col-md-8" id="form-add_Product" action="{{ route('save.Product') }}" method="POST">
        @csrf

        <input type="hidden" name="idProduct" id="idProduct" value="{{ $product->id ? $product->id : 0 }}">

        <div class="col-md-12">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Arroz" id="nombre" name="nombre"
                value="{{ $product->name ? $product->name : old('name') }}">
        </div>
        <div class="col-md-12">
            @error('nombre')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-12">
            <label class="form-label" for="costo">Costo</label>
            <input type="number" class="form-control" id="costo" name="costo" placeholder="50000"
                    value="{{ $product->cost ? $product->cost : old('cost') }}">
            {{-- Validación para el costo --}}
            <div class="col-md-12 mt-2">
                @error('costo')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <label class="form-label" for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="70000"
                value="{{ $product->price ? $product->price : old('price') }}">
            {{-- Validación para el precio --}}
            <div class="col-md-12 mt-2">
                @error('precio')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="12"
                value="{{ $product->quantity ? $product->quantity : old('quantity') }}">
            {{-- Validación para la cantidad --}}
            <div class="col-md-12 mt-2">
                @error('cantidad')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label for="marca" class="form-label">Marca</label>
            <select class="form-select" name="marca" id="marca">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $product->brand_id === $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select" name="categoria" id="categoria">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id === $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <a href="{{ route('products.getAll') }}" class="btn btn-info">Ver lista productos</a>
            <button type="submit"
                class="btn btn-primary">{{ $product->id ? 'Actualizar producto' : 'Agregar producto' }}</button>
        </div>
    </form>
@endsection
