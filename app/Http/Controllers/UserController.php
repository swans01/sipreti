<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function postSignUp(Request $request){

        $this->validate($request, [
            'email' => 'email|unique:users'
        ]);

        $email = $request['email'];
        $nama = $request['nama'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->nama = $nama;
        $user->password = $password;

        $user->save();

        return redirect()->route('pakar');

    }

    public function postSignIn(Request $request){
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            if ( auth()->user()->isAdmin == 1 ){
                return redirect()->route('admin');
            }else{
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function admin(){
        return view('viewAdmin');
    }   

    public function pakarHarian(){
        return view('pakarHarian');
    }

    public function pakarPeriode(){
        return view('pakarPeriode');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
?>