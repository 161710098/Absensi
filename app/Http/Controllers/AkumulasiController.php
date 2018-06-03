<?php

namespace App\Http\Controllers;
use App\Akumulasi;
use App\Kelas;
use Illuminate\Http\Request;
use App\Absensi;

class AkumulasiController extends Controller
{
    //
    public function index()
    {
        $kelas = Kelas::all();
        $absensi = absensi::all();
        return view('akumulasi.index', compact('absensi','kelas'));
    }

    public function index2(Request $request)
    {
        //
        $a = $request->a;
        $b = $request->b;
        $kelas = $request->c;
        $absensi = absensi::whereBetween('created_at', [$a, $b])->where('id_kelas','=',$kelas)->get();
        return view('akumulasi.index2', compact('absensi', 'a','b','kelas'));
    }
}
<?php

namespace App\Http\Controllers;
use App\Akumulasi;
use App\Kelas;
use Illuminate\Http\Request;
use App\Absensi;

class AkumulasiController extends Controller
{
    //
    public function index()
    {
        $kelas = Kelas::all();
        $absensi = absensi::all();
        return view('akumulasi.index', compact('absensi','kelas'));
    }

    public function index2(Request $request)
    {
        //
        $a = $request->a;
        $b = $request->b;
        $kelas = $request->c;
        $absensi = absensi::whereBetween('created_at', [$a, $b])->where('id_kelas','=',$kelas)->get();
        return view('akumulasi.index2', compact('absensi', 'a','b','kelas'));
    }
}
