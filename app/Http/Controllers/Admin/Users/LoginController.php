<?php

namespace App\Http\Controllers\Admin\Users;

use App\Events\LoginHistory;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use App\Models\LogHistory;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

//use App\Http\Controllers\Admin\Users;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.login',[
            'title'=>'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request)
    {
        $message =[
            'required' =>' :attribute không được trống !!!',
            'email' =>' :attribute phải có định dạng email !!!',
        ];

        $this->validate(
            $request,
            [
                'email'   =>'required|email:filter',
                'password'=>'required',
            ],
            $message
        );
        // Request data
        $remember = $request->input('remember');
        $email = $request->input('email');
        $password = $request->input('password');

        // Login process
        $postData = ['email' => $email, 'password' => $password];
        $attempt = FacadesAuth::attempt($postData);

        if ($attempt) {
            // $loginHi = new LogHistory();
            // event(new LoginHistory($loginHi));
            return redirect( route('main'));
        } else {
            FacadesSession::flash('error', "Email hoặc Passwork không đúng");
            return redirect()->back();
        }
    }
    //Register
    public function getRegister()
    {
        return view('admin.users.register',[
            'title'=>'Đăng ký tài khoản'
        ]
        );
    }
    public function postRegister(Request $request)
    {
         $this->validate($request,
          [
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|min:6|max:30',
            'returnpassword' =>'required|same:password'
          ],
          [
            'name.required'=>'firstname không được trống',
            'name.max'=>'firstname không được quá 255 kí tự',
           
            'email.max'=>'Email không được quá 255 kí tự',
            'email.required'=>'email không được để trống',
            'email.email'=>'Không phải định dạng của Email',
            'email.unique'=>'Không được trùng email',
            'password.min'=>'Mật khẩu phải trên 6 ký tự',
            'password.max'=>'Mật khẩu không được quá 30 ký tự',
            'password.required'=>'Password không được để trống',
            'returnpassword.required' => 'Bạn chưa nhập lại mật khẩu',
            'returnpassword.same' => 'Mật khẩu nhập lại chưa đúng'
          ]);
        $user = new User;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success','Đã xác nhận đăng kí tài khoản.');

    }

 public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login');
    }

}
