<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Método para añadir productos
    function showFormBrand(int $id = null)
    {
        if (!empty($id)) {
            $brand = Brand::findOrFail($id);
        } else {
            $brand = new Brand();
        }
        return view('brands.formAddBrand', compact('brand'));
    }

    function save(Request $request)
    {
        $id = $request->input('idBrand');

        $request->validate([
            'nombre' => ['required', 'max:50']
        ]);

        $brand = new Brand();

        if ($id > 0) {
            $brand = Brand::findOrFail($id);
        }

        $brand->name = $request->input('nombre');

        $brand->save();
        return redirect()
            ->route('brand.getAll')
            ->with('message', 'Marca salvada exitosamente!!');
    }

    // Método para traer todos los registros
    function showBrands()
    {
        $brands = Brand::all();
        return view('brands.listBrands', ['brands' => $brands]);
    }

    // Método para eliminar
    function delete(int $id)
    {
        $product = Brand::find($id);
        $product->delete();
        return redirect()->route('brand.getAll');
    }
}
