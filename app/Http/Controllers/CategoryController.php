<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Departament;

class CategoryController extends Controller
{
   
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->where('active', 1)->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $departaments = Departament::all();
        $select = [];
        foreach ($departaments as $departament) {
            $select[$departament->id] = $departament->name;
        }

        return view('admin.category.create', compact('select'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required',
            'departament_id' => 'required'
        ]);

        $name = $request->get('name');

        $image = $request->file('image');

        $path = Storage::disk('public')->put('images/categories', $image);

        Category::create([
            'name' => $name,
            'slug' => str_slug($name),
            'image' => asset($path),
            'active' => 1,
            'departament_id' => $request->departament_id,
        ]);

        return redirect()->route('categoria.index')
                ->with('success', 'Categoria creada exitosamente');
    }

    public function show($id)
    {
        $products = Category::find($id)->products;

        return view('admin.category.show', compact('products'));
    }


    public function edit($id)
    {
        $category = Category::find($id);
        $departaments = Departament::all();
        $select = [];
        foreach ($departaments as $departament) {
            $select[$departament->id] = $departament->name;
        }

        return view('admin.category.edit', compact('category', 'select'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'departament_id' => 'required'
        ]);

        $category = Category::find($id);

        $name = $request->name;

        $category->fill([
            'name' => $name,
            'slug' => str_slug($name),
            'departament_id' => $request->get('departament_id')
        ])->save();

        $image = $request->file('image');

        if ($image) {
            $path = Storage::disk('public')->put('images/categories', $image);

            $category->fill(['image' => asset($path)])->save();   
        }

        return redirect()->route('categoria.index')
            ->with('success', "Categoria {$category->name} editado exitosamente");
    }


    public function destroy($id)
    {

        Category::where('id', $id)
                ->update(['active' => 0]);

        return redirect()->route('categoria.index')
            ->with('success', "Categoria eliminada correctamente");
    }
}
