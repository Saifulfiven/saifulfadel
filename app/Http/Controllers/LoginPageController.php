<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginPageController extends Controller
{
    //
    public function index()
    {
        //$products = Product::latest()->paginate(5);
        //$berita = Berita::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $judulconten = "Halaman Login";
        $header = false;
        
        return view('login.signin', compact('judulconten','header'));
    }

    // public function actionlogin(Request $request)
    // {
    //     $data = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ];

    //     if (Auth::Attempt($data)) {
    //         return redirect('/dashboard');
    //     }else{
    //         Session::flash('error', 'Email atau Password Salah');
    //         return redirect('/login');
    //     }
    // }

    public function authenticate(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($admin) {
            $admin->remember_token = 1;
            $admin->save();
            
            session(['berhasil_login' => true]);
            session(['email'          => $request->email]);
            session(['id_timpengguna' => $admin->id]);
            session(['namapengguna'   => $admin->nama]);
            return redirect('/dashboard');
            
        } else {
            User::where('email', $request->email)->update(['remember_token' => 0]);

            
        return redirect('login')->with('error','Terdapat Kesalahan Data, Silahkan Login Kembali');
        }
    }

    public function actionlogout()
    {
        session()->forget('berhasil_login');
        $email = session('email');
        User::where('email', $email)->update(['remember_token' => 0]);
        session()->flush();
        return redirect('/login');
    }


    public function register()
    {
        return view('login/signup');
    }
    
    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => 1
        ]);

        // Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        // return redirect('/register');
        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
    }
}