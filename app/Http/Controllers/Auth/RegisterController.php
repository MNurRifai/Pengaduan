<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Masyarakat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:masyarakat');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showMasyarakatRegisterForm()
    {
        return view('auth.register', ['url' => 'masyarakat']);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createMasyarakat(Request $request)
    {
        $this->validator($request->all())->validate();
        $masyarakat = Masyarakat::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/masyarakat');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $this->validate($request,[
            'nik' => 'required|numeric|string|unique:masyarakats|digits:16',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:masyarakats',
            'telp' =>  'required|numeric|string|digits_between:12,13',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $masyarakat = new Masyarakat();
        $masyarakat->nik = $request->input('nik');
        $masyarakat->nama = $request->input('nama');
        $masyarakat->username = $request->input('username');
        $masyarakat->telp = $request->input('telp');
        $masyarakat->password = bcrypt($request->input('password'));
        $masyarakat->save();
        return redirect('/login/masyarakat');
    }
}
