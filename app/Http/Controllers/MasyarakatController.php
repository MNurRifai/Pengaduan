<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masyarakat;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat.index',compact('masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create');
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
        return redirect('/masyarakat')->with('success','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $masyarakat = Masyarakat::find($nik);
        return view('masyarakat.detail',compact('masyarakat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $masyarakat = Masyarakat::find($nik);
        return view('masyarakat.edit',compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $this->validate($request,[
            'nik' => 'required|numeric|string|digits:16|unique:masyarakats,nik,'.$nik .',nik',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:masyarakats,username,'.$nik .',nik',
            'telp' =>  'required|numeric|string|digits_between:12,13',
        ]);

        $masyarakat = Masyarakat::findOrFail($nik);
        $masyarakat->update($request->all());
        return redirect('/masyarakat')->with('success','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $masyarakat = Masyarakat::find($nik);
        $masyarakat->delete();
        return redirect('/masyarakat');
    }
}
