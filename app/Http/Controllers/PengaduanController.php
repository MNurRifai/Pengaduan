<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Kategori;
use App\Masyarakat;
use Carbon;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    //  */
    public function __construct(){
        $this->middleware('auth:masyarakat');
    }

    public function index()
    {
        $masyarakat = Masyarakat::where('nik',auth()->guard('masyarakat')->user()->nik)->get()->first();
        $pengaduan = Pengaduan::leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->select(['pengaduans.*','kategoris.nama_kategori'])
            ->where('nik',$masyarakat->nik)
            ->get();
        return view('pengaduan.index',compact('pengaduan','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $pengaduan = Pengaduan::all();
        return view('pengaduan.create',compact('pengaduan','kategori'));
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
            'foto' => 'sometimes|nullable|image|mimes:jpeg,png,jpg'
        ]);

        $now = \Carbon\Carbon::now();
        $pengaduan = new Pengaduan();
        $pengaduan->tgl_pengaduan = $now;
        $pengaduan->nik = $request->input('nik');
        $pengaduan->id_kategori = $request->input('id_kategori');
        $pengaduan->isi_laporan = $request->input('isi_laporan');
        $pengaduan->status ='0';
        if($request->hasFile('foto')){
            $foto =$request->file('foto');
            $ext=$foto->getClientOriginalName();
            if($request->hasFile('foto')){
                $foto_name = date('dmY').'_'.$ext;
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $pengaduan->foto = $foto_name;
            }
        }
        $pengaduan->save();
        return redirect('/riwayat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function detail($id)
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->select(['pengaduans.*','masyarakats.nama','kategoris.nama_kategori','tanggapans.*','admins.nama_petugas'])
            ->where('pengaduans.id',$id)
            ->first();
        return view('pengaduan.detail',compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
