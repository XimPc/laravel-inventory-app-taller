<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getList()
    {
        $categories = Category::all();
        return view('categories.listCategories', compact('categories'));
    }

    function add(int $id = null)
    {
        if (!empty($id)) {
            $category = Category::findOrFail($id);
        } else {
            $category = new Category();
        }
        return view('categories.formSaveCategory', compact('category'));
    }

    function save(Request $request)
    {
        $idCategoria = $request->input('idCategory');

        $request->validate([
            'nombre' => ['string', 'required', 'max:50'],
            'description' => ['required', 'max:1000']
        ]);

        $category = new Category();

        if ($idCategoria > 0) {
            $category = Category::findOrFail($idCategoria);
        }

        $category->name = $request->input('nombre');
        $category->description = $request->input('description');

        $category->save();
        return redirect()
            ->route('category.getAll')
            ->with('message', 'Categoria salvada exitosamente!!');
    }

    function delete(int $id)
    {
        Category::destroy($id);
        return redirect()->route('category.getAll');
    }
}
