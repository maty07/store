<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carousels = Carousel::orderBy('id', 'DESC')->where('active', 1)->paginate();

        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'path' => 'required'
        ]);

        $image = $request->file('path');

        $path = Storage::disk('public')->put('images/carousel', $image);

        Carousel::create([
            'name' => $request->name,
            'path' => asset($path)
        ]);

        return redirect()->route('carrusel.index')
                ->with('success', 'Imagen agregada correctamente al Carrusel');
    }

    public function show($id)
    {
        $carousel = Carousel::find($id);

        return view('admin.carousel.show', compact('carousel'));
    }

    public function edit($id)
    {
        $carousel = Carousel::find($id);

        return view('admin.carousel.edit', compact('carousel'));
    }


    public function update(Request $request, $id)
    {
        $carousel = Carousel::find($id);

        $request->validate([
            'name' => 'required',
            'path' => 'required'
        ]);

        $image = $request->file('path');

        $carousel->fill([
            'name' => $request->name,
        ]);

        if ($request->file('path')) {
           $path = Storage::disk('public')->put('images/carousel', $image);

           $carousel->fill([
                'path' => asset($path)
            ]);
        }

        return redirect()->route('carrusel.index')
                ->with('success', 'Imagen editada correctamente al Carrusel');
    }

    public function destroy($id)
    {
        $carousel = Carousel::where('id', $id)
            ->update(['active' => '0']);

        return redirect()->route('carrusel.index')
            ->with('success', 'Imagen eliminada correctamente del Carrusel');
    }

}
