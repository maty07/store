<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Departament;
use App\Category;
use App\Product;
use App\Sale;
use App\SaleDetail;

class ViewsStoreController extends Controller
{

    public function electro()
    {
        $categories = Departament::findOrFail(1)->categories;

        return view('store.departaments.electro', compact('categories'));
    }

    public function tecno()
    {
        $categories = Departament::findOrFail(2)->categories;

        return view('store.departaments.tecno', compact('categories'));
    }

    public function linea_blanca()
    {
        $categories = Departament::findOrFail(3)->categories;

        return view('store.departaments.linea_blanca', compact('categories'));
    }

    public function dormitorio()
    {
        $categories = Departament::findOrFail(4)->categories;

        return view('store.departaments.dormitorio', compact('categories'));
    }

    public function muebles()
    {
        $categories = Departament::findOrFail(5)->categories;

        return view('store.departaments.muebles', compact('categories'));
    }

    public function deco()
    {
        $categories = Departament::findOrFail(6)->categories;

        return view('store.departaments.deco', compact('categories'));
    }

    public function mujer()
    {
        $categories = Departament::findOrFail(7)->categories;

        return view('store.departaments.mujer', compact('categories'));
    }

    public function hombre()
    {
        $categories = Departament::findOrFail(8)->categories;

        return view('store.departaments.hombre', compact('categories'));
    }

    public function zapatos()
    {
        $categories = Departament::findOrFail(9)->categories;

        return view('store.departaments.zapatos', compact('categories'));
    }

    public function deportes()
    {
        $categories = Departament::findOrFail(10)->categories;

        return view('store.departaments.deportes', compact('categories'));
    }

    public function ninos()
    {
        $categories = Departament::find(11)->categories;

        return view('store.departaments.niños', compact('categories'));
    }

    public function showCategories($id)
    {
        $products = Category::find($id)->products;

        return view('store.categories', compact('products'));
    }

    public function showProducts($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('store.products', compact('product'));
    }

    public function cart(Request $request)
    {
        return view('store.cart');
    }

    public function getCart($id)
    {

        $product = Product::find($id);

        return response()->json($product);
    }

    public function lastIdSale()
    {
        return Sale::all()->last()->id;
    }


    public function buy(Request $request)
    {
  
        if ($request->has('cart')) {

            $cart = json_decode($request->cart);

            $total = $cart[0]->total;

            Sale::create([
                'user_id' => auth()->user()->id,
                'total' => $total,
                'active' => 1
            ]);

            foreach ($cart as $product) {
               SaleDetail::create([
                'product_id' => $product->id,
                'sale_id' => $this->lastIdSale(),
                'quantity' => $product->cantidad
               ]);
            }
        }

       return response()->json(['res' => 'boleta']);
    }


}
