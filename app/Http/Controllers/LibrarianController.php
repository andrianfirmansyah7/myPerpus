<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensis;
use App\Models\Books;
use App\Models\Peminjamans;
use App\Models\User;
use App\Models\Member;
use App\Models\Membership;

class LibrarianController extends Controller
{
    public function index()
    {
        return view('admin/admin');
    }

    public function addNewMember()
    {
        return view('admin/addmember');
    }

    public function borrow()
    {
        $data = Books::all();
        return view('admin/borrow',compact('data'));
    }

    public function editMember(Request $request,$id){
    $kr = Member::find($id);
    $input = $request->all();
    
    $kr->nama_member = $input['nama_member'];
    $kr->jenis_kelamin = $input['jenis_kelamin'];
    $kr->tanggal_lahir = $input['tanggal_lahir'];
    $kr->alamat = $input['alamat'];
    $kr->no_hp = $input['no_hp'];
    $kr->jenis_ = $input['jabatan'];
    $kr->save();

    return redirect()->route('librarian.member')->with(['success' => 'Berhasil Diubah']);
    }

    public function deleteMember($id){
    $ds = Member::find($id);
    $v = $ds->id_akun;
    $dati = User::find($v);

    if($ds->delete()){
        $dati->delete();
    return redirect()->route('librarian.member')->with(['success' => 'Berhasil Diubah']);    
    }
    }

    public function addMember(Request $request){
        $kr = new Member;
        $u = new User;
        $input = $request->all();

        $data = Karyawans::all();
        $count = $data->count();

        $cariId = User::all()->last();
        foreach($cariId as $cr){
            $ids = $cariId->id;
        }

        $id = $ids+1;

        $a = date("y");
        $c = rand(100,999);
        $d = $count+1;
        $b = "80";

        $nik = $a+$b+$c+$d;

        $u->name = $input['nama_member'];
        $u->email = $input['email'];
        $u->password = Hash::make($nik);
        $u->role = $input['jabatan'];
        $u->save();

        $kr->id = $nik;
        $kr->nama_karyawan = $input['nama_member'];
        $kr->jenis_kelamin = $input['jenis_kelamin'];
        $kr->tanggal_lahir = $input['tanggal_lahir'];
        $kr->alamat = $input['alamat'];
        $kr->no_hp = $input['no_hp'];
        $kr->id_akun = $id;
        $kr->jenis_membership = $input['jenis_membership'];
        $kr->foto = "image.png";
        $kr->save();

        return redirect()->route('librarian.member')->with(['success' => 'Berhasil Ditambahkan']);
    }

    public function editBook(Request $request){
        $bk = new Books;
        $input = $request->all();

        $bk->nama_buku = $input['nama_buku'];
        $bk->penulis = $input['penulis'];
        $bk->penerbit = $input['penerbit'];
        $bk->tahun_terbit = $input['tahun_terbit'];
        $bk->ikhtisar = $input['ikhtisar'];
        $bk->genre = $input['genre'];
        $bk->jumlah_halaman = $input['jumlah_halaman'];
        $bk->stok = $input['stok'];
        // if($request->file('nama_file') != null && $request->file('cover_buku') != null){
        // $gmbr = $request->file('cover_buku');
        // $g   = $r->getClientOriginalName();
        // $gmbr->move(\base_path() ."/public/images/", $g);
        // $gmbr2 = $request->file('nama_file');
        // $g2   = $r->getClientOriginalName();
        // $gmbr2->move(\base_path() ."/public/images/", $g2);

        // $bk->cover_buku = $g;
        // $bk->nama_file = $g2;
        // }
        $bk->save();

        return redirect()->route('admin.book')->with(['success' => 'Berhasil Ditambah']);
    }

        public function deleteBook($id){
    $ds = Books::find($id);

    if($ds != null){
    $ds->delete();
    return redirect()->route('admin.book')->with(['success' => 'Berhasil Diubah']);    
    }
    }

    public function addBook(Request $request){
        $bk = new Books;
        $input = $request->all();
        // $gmbr = $request->file('cover_buku');
        // $g   = $r->getClientOriginalName();
        // $gmbr->move(\base_path() ."/public/images/", $g);

        $bk->id = $input['no_isbn'];
        $bk->nama_buku = $input['nama_buku'];
        $bk->penulis = $input['penulis'];
        $bk->penerbit = $input['penerbit'];
        $bk->tahun_terbit = $input['tahun_terbit'];
        $bk->ikhtisar = $input['ikhtisar'];
        $bk->genre = $input['genre'];
        $bk->jumlah_halaman = $input['jumlah_halaman'];
        $bk->stok = $input['stok'];
        // $bk->cover_buku = $g;
        // if($request->file('nama_file') != null){
        // $bk->nama_file = $input['nama_buku'];
        // }
        $bk->save();

        return redirect()->route('admin.book')->with(['success' => 'Berhasil Ditambah']);
    }

}
