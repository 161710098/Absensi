<?php

namespace App\Http\Controllers;

use App\OrangTua;
use Illuminate\Http\Request;
use App\Vendor;
use Alert;
use App\Role;
use DB;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Orangtua;
use Illuminate\Http\Request;

class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orangtua = OrangTua::all();
        return view ('orangtua.index',compact('orangtua'));
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
          $user = new User;
        $user->name = $request->a;
        $user->email = $request->d;
        $user->password =bcrypt($request->e);
        $user->is_verified = 1;
        $user->save();
        $orangtuaRole = Role::where('name', 'orangtua')->first();
        $user->attachRole($orangtuaRole);

        $orangtua = new OrangTua;
        $orangtua->nama_ortu = $request->a;
        $orangtua->id_user = $user->id;
        $orangtua->alamat = $request->b;
        $orangtua->no_hp = $request->c;
        $orangtua->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('orangtua');

        $this->validate($request,[
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orangtua  $orangtua
     * @return \Illuminate\Http\Response
     */
    public function show(Orangtua $orangtua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orangtua  $orangtua
     * @return \Illuminate\Http\Response
     */
    public function edit(Orangtua $orangtua)
    {
        $orangtua = OrangTua::findOrFail($id);
        return view('orangtua.edit',compact('orangtua'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orangtua  $orangtua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orangtua $orangtua)
    {
         $orangtua = User::findOrFail($id);
        $user->name = $request->a;
        $user->email = $request->d;
        $user->password =bcrypt($request->e);
        $user->is_verified = 1;
        $user->save();
        $orangtuaRole = Role::where('name', 'orangtua')->first();
        $user->attachRole($orangtuaRole);

        $orangtua = OrangTua::findOrFail($id);
        $orangtua->nama_ortu = $request->a;
        $orangtua->id_user = $user->id;
        $orangtua->alamat = $request->b;
        $orangtua->no_hp = $request->c;
        $orangtua->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('user');

        $this->validate($request,[
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orangtua  $orangtua
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orangtua $orangtua)
    {
         $orangtua=OrangTua::findOrFail($id);
        $orangtua->delete();
        return redirect()->route('orangtua.index');
    }
}
