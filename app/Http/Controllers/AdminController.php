<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function loginAdmin(){
//       if(auth()->check()){
//           return redirect()->to('home');
//       }
//       dd(bcrypt('tung123'));
       return view('login');
   }
   public function postloginAdmin(Request $request){

       $remember=$request->has('remember_me') ? true : false;
       if(auth()->attempt([
           'email' =>$request->email,
           'password'=>$request->password
       ],$remember)){
           return redirect()->to('home');
       }
       else{
          print_r('Sai mat username hoac password ..Vui lòng đăng nhập lại');
       }

   }
}
