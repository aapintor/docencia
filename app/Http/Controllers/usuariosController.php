<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\organigrama;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Usuarios = User::select('users.*','organigramas.descripcion_area')
      ->join('organigramas','users.clave_area','=','organigramas.clave_area')
      ->get();
      return view('auth.index',['Usuarios' => $Usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $Areas = organigrama::select('clave_area','descripcion_area')->get();
      return view('auth.register',['Areas' => $Areas]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Usuario = User::select('users.*','organigramas.descripcion_area')
      ->where('users.id','=',$id)
      ->join('organigramas','users.clave_area','=','organigramas.clave_area')
      ->get();
      $Areas = organigrama::select('clave_area','descripcion_area')->get();
      return view('auth.editar',['Usuario' => $Usuario[0],'Areas'=>$Areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      DB::table('users')
          ->where('id', $id)
          ->update([
            'name' => $request->name,
            'rol' => $request->rol,
            'clave_area' => $request->clave_area,
            'password' => Hash::make($request->password),
          ]);

      return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        DB::table('users')->where('id', $id)->delete();
      } catch(Exception $e) {
        abort(403, 'La acción que intenta realizar no está permitida debido a que es indispensable para el sistema.');
      }

      return redirect()->route('admin');
    }
}
