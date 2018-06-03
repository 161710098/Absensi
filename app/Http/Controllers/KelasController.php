<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Jurusan;
use Illuminate\Http\Request;
use Alert;
use DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view ('kelas.index',compact('jurusan','kelas'));

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
        $kelas = new Kelas;
        $kelas->id_jurusan = $request->a;
        $kelas->nama_kelas = $request->b;
        $kelas->walikelas = $request->c;
        $kelas->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('kelas');

        $this->validate($request,[
            'id_jurusan' => 'required',
            'nama_kelas' => 'required',
            'walikelas' => 'required',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
          $kelas = Kelas::findOrFail($id);
        return view('kelas.edit',compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->id_jurusan = $request->a;
        $kelas->nama_kelas = $request->b;
        $kelas->walikelas = $request->c;
        $kelas->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('kelas');

        $this->validate($request,[
            'id_jurusan' => 'required',
            'nama_kelas' => 'required',
            'walikelas' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
         $kelas=Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}
