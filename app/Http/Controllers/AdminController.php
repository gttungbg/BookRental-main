<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Listeners\storeUserLoginHistory;
use App\Events\logHistory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class AdminController extends Controller
{
   public function loginAdmin(){

//     if(auth()->check()){
//         return view('login');
//     }
//       return redirect()->to('home');
       return view('login');
   }

   public function postloginAdmin(Request $request)
   {

       $remember=$request->has('remember_me') ? true : false;
       if(Auth::attempt([
           'email' =>$request->email,
           'password'=>$request->password
       ],$remember)){

           $loginHistory = new \App\Models\LogHistory();
           event(new logHistory($loginHistory));
           return redirect()->to('home');
       }
       else{
          print_r('Sai mat username hoac password ..Vui lòng đăng nhập lại');
       }
   }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
