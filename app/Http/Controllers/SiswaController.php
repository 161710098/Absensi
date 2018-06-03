<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use App\OrangTua;
use Illuminate\Http\Request;
use Alert;
use DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orangtua = OrangTua::all();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        return view ('siswa.index',compact('orangtua','siswa','kelas'));
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
         $siswa = new Siswa;
        $siswa->id_kelas = $request->b;
        $siswa->id_ortu = $request->f;
        $siswa->nama_siswa = $request->a;
        $siswa->nis = $request->c;
        $siswa->alamat = $request->d;
        $siswa->no_hp = $request->e;
        $siswa->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('siswa');

        $this->validate($request,[
            'id_kelas' => 'required',
            'id_ortu' => 'required',
            'nis' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
         $siswa = Siswa::findOrFail($id);
        return view('siswa.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
         $siswa = Siswa::findOrFail($id);
        $siswa->id_kelas = $request->b;
        $siswa->id_ortu = $request->f;
        $siswa->nama_siswa = $request->a;
        $siswa->nis = $request->c;
        $siswa->alamat = $request->d;
        $siswa->no_hp = $request->e;
        $siswa->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('siswa');

        $this->validate($request,[
            'id_kelas' => 'required',
            'id_ortu' => 'required',
            'nis' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
          $siswa=siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
