<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'nom_usuario' => 'required|string|string|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:4',
        ]);

        $nombre_archivo= $this->get_images($request);

        $user = User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'nom_usuario' => $request->nom_usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $nombre_archivo
        ]);

        $user->roles()->sync($request->rol); //Asignamos el rol al usuario

        //event(new Registered($user));

        return redirect(RouteServiceProvider::USER);
        //return back();
    }

    private function get_images(Request $request){
        if ($request->hasFile('image')){
            $file           = $request->file("image");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("img/usuario/"),$nombrearchivo);
            return $nombrearchivo;
        }        
        return null;
    }
}
