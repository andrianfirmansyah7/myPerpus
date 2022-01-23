<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensis;
use App\Models\Books;
use App\Models\Peminjamans;
use App\Models\User;
use App\Models\Member;
use App\Models\Membership;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;

class LibrarianController extends Controller
{

    public function getId(){
        $a = auth()->user()->id;
        $data = DB::table('karyawans')->select('id')->where('id_akun',$a)->get();
        foreach($data as $dt){
            $id = $dt->id;
        }
        return $id;
    }

    public function borrow()
    {
        $id = $this->getId();
        $data = Books::all();
        return view('admin/borrow',compact('data','id'));
    }

    public function back()
    {
        $id = $this->getId();
        $data = Peminjamans::all();
        return view('admin/back',compact('data','id'));
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

    public function addNewMember(){
        $id = $this->getId();
        return view('admin/addmember',compact('id'));
    }

    public function member(){
        $id = $this->getId();
        $dati = User::all();
        $data = Member::all();
        return view('admin/member',compact('id','data','dati'));
    }

    public function addMember(Request $request){
        $kr = new Member;
        $u = new User;
        $input = $request->all();

        $data = Member::all();
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
        $u->role = 'member';
        $u->save();

        $kr->id = $nik;
        $kr->nama_member = $input['nama_member'];
        $kr->jenis_kelamin = $input['jenis_kelamin'];
        $kr->tanggal_lahir = $input['tanggal_lahir'];
        $kr->alamat = $input['alamat'];
        $kr->no_hp = $input['no_hp'];
        $kr->id_akun = $id;
        $kr->jenis_membership = $input['jenis_membership'];
        $kr->foto = "image.png";
        $kr->status_akun = "Aktif";
        $kr->save();
        Alert::success('Berhasil Ditambahkan', 'Buku Berhasil Ditambahkan');
        return redirect()->route('librarian.member');
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

    public function editBook(Request $request,$id){
        $input = $request->all();
        $bk = Books::find($id);

        $bk->nama_buku = $input['nama_buku'];
        $bk->penulis = $input['penulis'];
        $bk->penerbit = $input['penerbit'];
        $bk->tahun_terbit = $input['tahun_terbit'];
        $bk->ikhtisar = $input['ikhtisar'];
        $bk->genre = $input['genre'];
        $bk->jumlah_halaman = $input['jumlah_halaman'];
        $bk->stok = $input['stok'];

        if($request->file('nama_file') != null && $request->file('cover_buku') != null){
        $gmbr = $request->file('cover_buku');
        $g   = $r->getClientOriginalName();
        $gmbr->move(\base_path() ."/public/image/cover", $g);
        $gmbr2 = $request->file('nama_file');
        $g2   = $r->getClientOriginalName();
        $gmbr2->move(\base_path() ."/public/pdf/", $g2);

        $bk->cover_buku = $g;
        $bk->nama_file = $g2;
        }
        $bk->save();

        return redirect()->route('librarian.book')->with(['success' => 'Berhasil Ditambah']);
    }

    public function deleteBook($id){
    $ds = Books::find($id);

    if($ds != null){
    $ds->delete();
    return redirect()->route('librarian.book')->with(['success' => 'Berhasil Diubah']);
    }
    }

    public function addBook(Request $request){
        $bk = new Books;
        $input = $request->all();

        $bk->id = $input['isbn'];
        $bk->nama_buku = $input['nama_buku'];
        $bk->penulis = $input['penulis'];
        $bk->penerbit = $input['penerbit'];
        $bk->tahun_terbit = $input['tahun_terbit'];
        $bk->ikhtisar = $input['ikhtisar'];
        $bk->genre = $input['genre'];
        $bk->jumlah_halaman = $input['jumlah_halaman'];
        $bk->stok = $input['stok'];
        $gmbr = $request->file('cover_buku');
        $g   = $gmbr->getClientOriginalName();
        $gmbr2 = $request->file('pdf_buku');
        $g2   = $gmbr2->getClientOriginalName();

        $bk->cover_buku = $g;
        $bk->nama_file = $g2;

        if($bk->save()){
        $gmbr->move(\base_path() ."/public/buku/cover", $g);
        $gmbr2->move(\base_path() ."/public/buku/pdf/", $g2);
        }
        Alert::success('Berhasil Ditambahkan', 'Buku Berhasil Ditambahkan');
        return redirect()->route('librarian.book')->with(['success' => 'Berhasil Ditambah']);
    }

    public function membership(){
        $id = $this->getId();
        $data = DB::table('member')->select('*')->where('status_akun','Belum Aktif')->get();
        return view('admin/membership',compact('data','id'));
    }

    public function book(){
        $id = $this->getId();
        $data = Books::all();
        return view('admin/book', compact('data','id'));
    }

    public function terima($id){
      $id = $this->getId();
      $data = Peminjamans::find($id);
      $data->status = "Diterima";
      $data->save();
      return view('admin/back', compact('data','id'));
    }

    public function tolak($id){
      $id = $this->getId();
      $data = Peminjamans::find($id);
      $data->status = "Ditolak";
      $data->save();
      return view('admin/back', compact('data','id'));
    }

}
