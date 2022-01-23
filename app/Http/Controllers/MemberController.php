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
        /*$id = auth()->user()->id;*/
        $id = 356; 
        $data = DB::table('peminjamans')->select('*')->where('peminjam',$id)->get();
        return view('borrow',compact('data'));
    }

}
