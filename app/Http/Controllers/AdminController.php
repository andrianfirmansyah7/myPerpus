<?php

namespace App\Http\Controllers;
use App\Models\Karyawans;
use App\Models\Presensis;
use App\Models\Books;
use App\Models\Peminjamans;
use App\Models\User;
use Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getId(){
        $a = auth()->user()->id;
        $data = DB::table('karyawans')->select('id')->where('id_akun',$a)->get();
        foreach($data as $dt){
            $id = $dt->id;
        }
        return $id;
    }

    public function index()
    {
        $id = $this->getId();
        $statistik1 = DB::table('books')->count();
        $statistik2 = DB::table('member')->count();
        $statistik3 = DB::table('peminjamans')->where('status','Diterima')->count();
        $statistik4 = DB::table('karyawans')->count();
        $statistik5 = DB::select("SELECT peminjamans.buku, count(peminjamans.buku) as jumlah_buku, books.nama_buku from peminjamans LEFT JOIN books on peminjamans.buku = books.id where peminjamans.status = 'Diterima' GROUP BY peminjamans.buku");
        $statistik6 = DB::select("SELECT * FROM books order by created_at desc limit 5");
        return view('admin/admin',compact('id','statistik1','statistik2','statistik3','statistik4', 'statistik5', 'statistik6'));
    }

    public function changePassword(Request $request, $id){
      $isd = $this->getId();
      $data = DB::table('karyawans')->join('users','karyawans.id_akun','=','users.id')->select('karyawans.id','karyawans.nama_karyawan','karyawans.jenis_kelamin','karyawans.tanggal_lahir','karyawans.alamat','karyawans.no_hp','karyawans.jabatan','karyawans.foto','users.email','karyawans.id_akun')->where('karyawans.id',$id)->get();
      $datas = User::find($id);
      $input = $request->all();

      if($input['password'] == $input['Konfirmasi']){
        $datas->password = Hash::make($input['password']);
        return redirect()->route('admin.profile')->with(['success' => 'Berhasil Diubah']);
      }else{
        return redirect()->route('admin.profile')->with(['gagal' => 'Gagal Diubah']);
      }
    }

    public function employee(){
        $id = $this->getId();
        $data = Karyawans::all();
        $dati = User::all();
        return view('admin/employee',compact('data','dati','id'));
    }

    public function target(){
        $id = $this->getId();
        $data = Karyawans::all();
        $dati = User::all();
        return view('admin/target',compact('data','dati','id'));
    }

    public function historyTarget(){
        $id = $this->getId();
        $data = Karyawans::all();
        $dati = User::all();
        return view('admin/historyTarget',compact('data','dati','id'));
    }

    public function profile($id){
        $id = $this->getId();
         $data = DB::table('karyawans')->join('users','karyawans.id_akun','=','users.id')->select('karyawans.id','karyawans.nama_karyawan','karyawans.jenis_kelamin','karyawans.tanggal_lahir','karyawans.alamat','karyawans.no_hp','karyawans.jabatan','karyawans.foto','users.email','karyawans.id_akun')->where('karyawans.id',$id)->get();
         return view('admin/profile',compact('data','id'));
    }

    public function presence(){
        $id = $this->getId();
        $data = Presensis::all();
        return view('admin/presence', compact('data','id'));
    }

    public function addPrecense(){
        $id = $this->getId();
        return view('admin/addprecense',compact('id'));
    }

    public function book(){
        $id = $this->getId();
        $data = Books::all();
        return view('admin/book', compact('data','id'));
    }

    public function borrow(){
        $id = $this->getId();
        $data = Peminjamans::where('status','Proses Peminjaman');
        return view('admin/borrow',compact('id'));
    }

    public function member(){
        $id = $this->getId();
        $data = Member::all();
        return view('admin/member',compact('id'));
    }

    public function membership(){
        return view('admin/membership');
    }

    public function editEmployee(Request $request,$id){
    $id = $this->getId();
    $kr = Karyawans::find($id);
    $input = $request->all();

    $kr->nama_karyawan = $input['nama_karyawan'];
    $kr->jenis_kelamin = $input['jenis_kelamin'];
    $kr->tanggal_lahir = $input['tanggal_lahir'];
    $kr->alamat = $input['alamat'];
    $kr->no_hp = $input['no_hp'];
    $kr->jabatan = $input['jabatan'];
    $kr->save();

    return redirect()->route('admin.employee',compact('id'))->with(['success' => 'Berhasil Diubah']);
    }

    public function deleteEmployee($id){
    $id = $this->getId();
    $ds = Karyawans::find($id);
    $v = $ds->id_akun;
    $dati = User::find($v);

    if($ds->delete()){
        $dati->delete();
        return redirect()->route('admin.employee',compact('id'));
        Alert::success('Berhasil Dihapus', 'Karyawan Berhasil Dihapus');
    }
    }

    public function addEmployee(Request $request){
        $id = $this->getId();
        $kr = new Karyawans;
        $u = new User;
        $input = $request->all();

        $data = Karyawans::all();
        $count = $data->count();

        $cariId = User::all()->last();
        foreach($cariId as $cr){
            $ids = $cariId->id;
        }

        $id = $ids+1;
        $a = 1;
        $c = rand(1000000,9999900);
        $d = $count+1;

        if($input['jabatan'] == "pustakawan"){
            $b = 10;
        }else if($input['jabatan'] == "kurir"){
            $b = 20;
        }else{
            $b = 30;
        }

        $nik = $a+$b+$c+$d;

        $u->name = $input['nama_karyawan'];
        $u->email = $input['email'];
        $u->password = Hash::make($nik);
        $u->role = $input['jabatan'];
        $u->save();

        $kr->id = $nik;
        $kr->nama_karyawan = $input['nama_karyawan'];
        $kr->jenis_kelamin = $input['jenis_kelamin'];
        $kr->tanggal_lahir = $input['tanggal_lahir'];
        $kr->alamat = $input['alamat'];
        $kr->no_hp = $input['no_hp'];
        $kr->id_akun = $id;
        $kr->jabatan = $input['jabatan'];
        $kr->foto = "image.png";
        $kr->save();

        return redirect()->route('admin.employee',compact('id'))->with(['success' => 'Berhasil Ditambahkan']);
    }



}
