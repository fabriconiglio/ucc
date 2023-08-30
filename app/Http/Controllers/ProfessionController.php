<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    // Listar todas las profesiones
    public function index()
    {
        $professions = Profession::all();
        return view('professions.index', compact('professions'));
    }

    // Mostrar el formulario para crear una nueva profesión
    public function create()
    {
        return view('professions.create');
    }

    // Almacenar una nueva profesión en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:professions|max:255',
        ]);

        Profession::create($validatedData);

        return redirect()->route('professions.index')->with('success', 'Profession created successfully.');
    }

    // Mostrar detalles de una profesión específica (opcional)
    public function show(Profession $profession)
    {
        return view('professions.show', compact('profession'));
    }

    // Mostrar el formulario para editar una profesión
    public function edit(Profession $profession)
    {
        return view('professions.edit', compact('profession'));
    }

    // Actualizar una profesión en la base de datos
    public function update(Request $request, Profession $profession)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:professions,name,'.$profession->id.'|max:255',
        ]);

        $profession->update($validatedData);

        return redirect()->route('professions.index')->with('success', 'Profession updated successfully.');
    }

    // Eliminar una profesión de la base de datos
    public function destroy(Profession $profession)
    {
        $profession->delete();
        return redirect()->route('professions.index')->with('success', 'Profession deleted successfully.');
    }
}
