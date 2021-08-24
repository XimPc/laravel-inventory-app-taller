<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // function getOne(int $id)
    // {
    //     $getProduct = Product::find($id);
    //     return view('products/product', ['oneProducts' => $getProduct->toArray()]);
    // }

    //mostrar el form de agregar y traer los datos para editar
    function formAddProducts(int $id = null)
    {
        if (!empty($id)) {
            $product = Product::findOrFail($id);
        } else {
            $product = new Product();
        }
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.formAddProducts', compact('product', 'brands', 'categories'));
    }

    //salvar los registros | Editar y registrar
    function save(Request $request)
    {
        $id = $request->input('idProduct');

        $request->validate([
            'nombre' => ['required', 'max:50'],
            'costo' => ['required', 'numeric'],
            'precio' => ['required', 'numeric'],
            'cantidad' => ['required', 'numeric'],
            'marca' => ['required', 'max:50'],
            'categoria' => ['required', 'max:100'],
        ]);

        $product = new Product;

        if ($id > 0) {
            $product = Product::findOrFail($id);
        }

        $product->name = $request->input('nombre');
        $product->cost = $request->input('costo');
        $product->price = $request->input('precio');
        $product->quantity = $request->input('cantidad');
        $product->brand_id = $request->input('marca');
        $product->category_id = $request->input('categoria');

        $product->save();
        return redirect()
            ->route('products.getAll')
            ->with('message', 'Producto salvado exitosamente!!');;
    }

    // Traer todos los registros
    function showProducts()
    {
        $products = Product::all();
        return view('products.listProducts', ['products' => $products]);
    }

    // eliminar por id
    function delete(int $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.getAll');
    }
}
