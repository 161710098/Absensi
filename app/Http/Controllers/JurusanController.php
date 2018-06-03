<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;
use App\Vendor;
use Alert;
use DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view ('jurusan.index',compact('jurusan'));
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
         $jurusan = new Jurusan;
        $jurusan->nama_jur = $request->a;
        $jurusan->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('jurusan');

        $this->validate($request,[
            'nama_jur' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
         $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit',compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->nama_jur = $request->a;
        $jurusan->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('jurusan');

        $this->validate($request,[
            'nama_jur' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan=Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index');
 
    }
}
