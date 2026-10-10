<?php
namespace App\Http\Controllers;
use App\Models\User; use Illuminate\Http\Request; use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
 public function showLogin(){return view('auth.login');}
 public function login(Request $request){$credentials=$request->validate(['email'=>'required|email','password'=>'required|string']);if(!Auth::attempt($credentials,$request->boolean('remember'))){return back()->withErrors(['email'=>'Identifiants invalides.'])->withInput();}$request->session()->regenerate();return redirect()->intended('/dashboard');}
 public function showRegister(){return view('auth.register');}
 public function register(Request $request){$data=$request->validate(['name'=>'required|string|max:120','email'=>'required|email|unique:users','password'=>'required|string|min:8|confirmed']);$user=User::create($data+['role'=>'user']);Auth::login($user);return redirect('/dashboard');}
 public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect('/');}
}
