<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('level:admin');
    //     $this->middleware('auth');
    // }
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Admin::all();
        return view('admin.index',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|unique:admins',
            'telp' => 'required|numeric|string',
            'level' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = new Admin();
        $admin->nama_petugas = $request->input('nama_petugas'); 
        $admin->username = $request->input('username'); 
        $admin->telp = $request->input('telp'); 
        $admin->level = $request->input('level'); 
        $admin->password = bcrypt($request->input('password'));
        $admin->save();
        return redirect('/admin')->with('success','Data berhasil ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.detail',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|unique:admins,username,'.$id,
            'telp' => 'required|numeric|string|digits_between:12,13',
            'level' => 'required|string',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($request->all());
        return redirect('/admin')->with('success','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/admin')->with('success','Data berhasil dihapus!');
    }
}
