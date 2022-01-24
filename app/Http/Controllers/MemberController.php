<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Peminjamans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $data = Books::all()->sortBy("created_at")->take(10);
        $dati = Books::all();
        return view('home',compact('data','dati'));
    }

    public function indax()
    {
        $data = Books::all()->sortBy("created_at")->take(10);
        $dati = Books::all();
        return view('home',compact('data','dati'));
    }

    public function getBook($id){
        $data = DB::table('books')->select('*')->where('id',$id)->get();
        return view('detailBuku',compact('data'));
    }

    public function pinjamBuku(Request $request){
        $r = new Peminjamans;
        $input = $request->all();

        DB::table('peminjamans')->insert([
            'peminjam'=>356,
            'buku'=>$input['buku'],
            'awal_peminjaman'=>date("Y-m-d"),
            'akhir_peminjaman'=>$input['tanggal'],
            'status'=> "Belum ACC"
        ]);


        return redirect()->route('member.borrowBook')->with(['success' => 'Berhasil Ditambahkan']);
    }



    public function borrowBook(){
        $id = auth()->user()->id;
        $data = DB::select("SELECT peminjamans.peminjam, peminjamans.buku, peminjamans.status, books.nama_buku, peminjamans.awal_peminjaman, peminjamans.akhir_peminjaman from peminjamans LEFT JOIN books on peminjamans.buku = books.id");
        return view('borrow',compact('data'));
    }

    public function readBook($id){
      $data = DB::table('books')->select('*')->where('id',$id)->get();
      return view('readBook',compact('data'));
    }

    public function register(Request $req){
      return view('register');
    }
}
