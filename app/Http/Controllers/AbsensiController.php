<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Siswa;
use App\Kelas;
use App\OrangTua;
use Illuminate\Http\Request;
use Alert;
use DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class AbsensiController extends Controller
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
        $absensi = Absensi::all();
        return view ('absensi.index',compact('absensi','orangtua','siswa','kelas'));

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
        $absensi = new Absensi;
        $absensi->id_siswa = $request->a;
        $absensi->id_kelas = $request->b;
        $siswa = Siswa::findOrFail($request->a);
        $absensi->id_ortu = $siswa->id_ortu;
        $absensi->keterangan = $request->c;
        $absensi->tgl = $request->d;
        $absensi->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('absensi');

        $this->validate($request,[
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'id_ortu' => 'required',
            'keterangan' => 'required',
            'tgl' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
         $absensi = Absensi::findOrFail($id);
        return view('absensi.edit',compact('absensi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
         $absensi = Absensi::findOrFail($id);
        $absensi->id_siswa = $request->a;
        $absensi->id_kelas = $request->b;
        $siswa = Siswa::findOrFail($request->a);
        $absensi->id_ortu = $siswa->id_ortu;
        $absensi->keterangan = $request->c;
        $absensi->tgl = $request->d;
        $absensi->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect('absensi');

        $this->validate($request,[
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'id_ortu' => 'required',
            'keterangan' => 'required',
            'tgl' => 'required',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
         $absensi=Absensi::findOrFail($id);
        $absensi->delete();
        return redirect()->route('absensi.index');
    }
}
