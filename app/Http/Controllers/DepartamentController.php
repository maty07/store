<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departament;

class DepartamentController extends Controller
{
   
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departaments = Departament::where('active', 1)->paginate();

        return view('admin.departament.index', compact('departaments'));
    }

    public function create()
    {
        return view('admin.departament.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departaments'
        ]);

        $name = $request->get('name');

        Departament::create([
            'name' => $name,
            'slug' => str_slug($name),
            'active' => 1
        ]);

        return redirect()->route('departamento.index')
                ->with('success', 'Departamento creado exitosamente');
    }

    public function show($id)
    {
       $categories = Departament::find($id)->categories;

       return view ('admin.departament.show', compact('categories'));
    }


    public function edit($id)
    {
        $departament = Departament::find($id);

        return view('admin.departament.edit', compact('departament'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $name = $request->get('name');

        $departament = Departament::find($id);

        $departament->fill([
            'name' => $name,
            'slug' => str_slug($name),
            'active' => 1
            
        ])->save();

        return redirect()->route('departamento.index')
            ->with('success', "Departamento {$departament->name} editado exitosamente");
    }


    public function destroy($id)
    {

        Departament::where('id', $id)
                ->update(['active' => 0]);

        return redirect()->route('departamento.index')
            ->with('success', "Departamento eliminado correctamente");
    }


    //VIEWS NAV DEPARTAMENTS



}
