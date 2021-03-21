<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('table.tablaU', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $rol_actual = DB::select("select model_has_roles.role_id as id
                            from model_has_roles
                            where model_has_roles.model_id = ".$id);
        //return  $rol_actual[0]->id;
        return view('forms.formUedit', compact('user','roles','rol_actual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'nom_usuario' => 'required|string|string|max:50',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:4',
        ]);

        $newU = User::findOrFail($id);
        $newU->name = $request->name;
        $newU->apellido = $request->apellido;
        $newU->email = $request->email;
        $newU->nom_usuario = $request->nom_usuario;
        $this->change_password($request, $newU);
        $newU->image = $this->get_images($request, $newU);
        $newU->save();
        $newU->roles()->sync($request->rol); //Asignamos el rol al usuario
        return redirect()->route('tablaU');
    }

    private function change_password(Request $request, User $user){
        if( strcmp($request->password, $user-> password) == 0 ){
            $user->password = $user->password;
        }
        else{
            $user->password = Hash::make($request->password);  
        }          
    }

    private function get_images(Request $request, User $user){
        if( $request->get('limpiar') == "limpiar" )
            return null;
        else if ($request->hasFile('image') ){
            $file           = $request->file("image");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("img/usuario/"),$nombrearchivo);
            return $nombrearchivo;
        }        
        else{
            return $user->image;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('eliminar','ok');
    }
}
