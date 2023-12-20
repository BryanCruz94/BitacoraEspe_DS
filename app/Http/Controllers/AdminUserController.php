<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\IteratorFileSystem;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('adminUsers.adminUsers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = $request->post('password');
        $passwordVerify = $request->post('password_verify');

        $user = new User();
        $user->names = $request->post('names');
        $user->last_names = $request->post('last_names');
        $user->email = $request->post('email');
        $user->identification_card = $request->post('identification_card');
        $user->phone = $request->post('phone');
        $user->blood_type = $request->post('blood_type');
        $user->is_admin = $request->has('is_admin');


        if ($password == $passwordVerify) {
            $user->password = Hash::make('password');
            $user->save();
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.index')->with('error', 'Las contraseñas no coinciden');

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('adminUsers.updateUsers', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(isset($request->password) && isset($request->password_verify)){
            $password = $request->post('password');
            $passwordVerify = $request->post('password_verify');

            if ($password == $passwordVerify) {
                $user->password = Hash::make('password');
            } else {
                return redirect()->route('user.index')->with('error', 'Las contraseñas no coinciden');
            }

        }



        $user->names = $request->post('names');
        $user->last_names = $request->post('last_names');
        $user->email = $request->post('email');
        $user->identification_card = $request->post('identification_card');
        $user->phone = $request->post('phone');
        $user->blood_type = $request->post('blood_type');
        $user->is_admin = $request->has('is_admin');
        $user->save();
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $datos = User::find($id);
        return view('adminUsers.deleteUsers', compact('datos'));
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('user.index')->with('mensaje', 'Vehículo eliminado exitosamente');
    }
}
