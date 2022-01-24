<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Karyawans;
use App\Models\User;
use App\Models\Member;
use Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == "admin"){
                return redirect()->route('admin.home');
            }else if(auth()->user()->role == "pustakawan"){
                return redirect()->route('librarian.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home')
                ->with('error','Email Address And Password Are Wrong.');
        }
    }

    public function logout(Request $request) {
        Auth()->logout();
        return redirect()->route('home');
    }

    public function register(Request $request){
      $u = new User;
      $kr = new Member;
      $input = $request->all();

      $data = Member::all();
      $count = $data->count();

      $cariId = User::all()->last();
      foreach($cariId as $cr){
          $ids = $cariId->id;
      }

      $id = $ids+1;
      $a = 1;
      $c = rand(1000000,9999900);
      $d = $count+1;

      $nik = $a+$c+$d;

      $u->name = $input['nama_member'];
      $u->email = $input['email'];
      $u->password = Hash::make($nik);
      $u->role = 'member';
      $u->save();

      $kr->id = $nik;
      $kr->nama_member = $input['nama_member'];
      $kr->jenis_kelamin = "-";
      $kr->tanggal_lahir = "-";
      $kr->alamat = "-";
      $kr->no_hp = $input['no_hp'];;
      $kr->id_akun = $id;
      $kr->jenis_membership = "Basic";
      $kr->foto = "image.png";
      $kr->status_akun = "Aktif";
      $kr->save();
      return redirect()->route('home');
    }
}
