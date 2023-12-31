<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['address', 'professions'])->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all();
        return view('users.create', compact('professions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Encriptar la contraseña

        $user = User::create($data);
        $user->professions()->sync($request->input('professions', []));

        $addressData = $request->input('address');
        $address = new Address($addressData);

        $user->address()->save($address);

        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $professions = Profession::all();
        return view('users.edit', compact('user', 'professions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'email'])); // y los demás campos que desees actualizar del usuario

        // Sincronizar las profesiones
        $user->professions()->sync($request->input('professions', []));

        // Actualizar o crear la dirección
        $addressData = $request->input('address');

        if ($user->address) {
            $user->address->update($addressData);
        } else {
            $address = new Address($addressData);
            $user->address()->save($address);
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito');
    }

}
