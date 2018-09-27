<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\Genre;

class ProductController extends Controller
{
   
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->where('active', 1)->paginate();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $select_cat = [];

        foreach ($categories as $category) {
            $select_cat[$category->id] = $category->name;
        }

        $genres = Genre::all();
        $select_gen = [];

        foreach ($genres as $genre) {
            $select_gen[$genre->id] = $genre->name;
        }

        return view('admin.product.create', compact('select_cat', 'select_gen'));
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();

        return view('admin.product.show', compact('product'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'category_id' => 'required', 
        ]);

        $name = $request->name;

        $image = $request->file('image');

        $path = Storage::disk('public')->put('images/products', $image);

        $product = Product::create([
            'name' => $name,
            'slug' => str_slug($name),
            'description' => $request->description,
            'image' => asset($path),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'active' => 1,
            'category_id' => $request->category_id,
            'genre_id' => $request->genre_id
        ]);

        return redirect()->route('producto.index')
                ->with('success', 'Producto creado exitosamente');
    }


    public function edit($id)
    {
        $product = Product::find($id);

        $category = $product->category->name;

        $genre = $product->genre->name;

        return view('admin.product.edit', compact('product', 'genre', 'category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => $name,
            'slug' => str_slug($name),
            'description' => $required->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'active' => 1,
            'category_id' => $request->category_id,
            'genre_id' => $request->genre_id      
        ]);

        $name = $request->name;

        $product = Product::find($id);

        $product->fill([
            'name' => $name,
            'slug' => str_slug($name),
            'description' => $required->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'active' => 1,
            'category_id' => $request->category_id,
            'genre_id' => $request->genre_id
        ])->save();

        $image = $request->file('image');
        if ($image) {
            $path = Storage::disk('public')->put('images/products', $image);

            $product->fill(['image' => asset($path)])->save();
        }

        return redirect()->route('producto.index')
            ->with('success', "Producto {$product->name} editado exitosamente");
    }


    public function destroy($id)
    {

        Product::where('id', $id)
                ->update(['active' => 0]);

        return redirect()->route('producto.index')
            ->with('success', "Producto eliminado correctamente");
    }
}
