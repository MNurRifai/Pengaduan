<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use PDF;

class TanggapanController extends Controller
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
        $pengaduan = Pengaduan::leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
        ->select(['pengaduans.*','kategoris.nama_kategori'])
        ->get();
        return view('tanggapan.index',compact('pengaduan'));
    }

    public function riwayat()
    {
        $pengaduan = Pengaduan::leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
        ->select(['pengaduans.*','kategoris.nama_kategori'])
        ->get();
        return view('tanggapan.riwayat',compact('pengaduan'));
    }

    public function indexcetakpdf()
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori','admins.nama_petugas','tanggapans.*')
            ->get();
        date_default_timezone_set('Asia/Makassar');
        $todayDate = date("d/m/Y");

        $pdf = PDF::loadView('tanggapan.indexpdf', compact('pengaduan'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Pengaduan - '.$todayDate.'.pdf');
    }

    public function cetakpdf()
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori','admins.nama_petugas','tanggapans.*')
            ->get();
        date_default_timezone_set('Asia/Makassar');
        $todayDate = date("d/m/Y");

        $pdf = PDF::loadView('tanggapan.riwayatpdf', compact('pengaduan'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Pengaduan - '.$todayDate.'.pdf');
    }

    public function cetakpdf_detail($id)
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->where('id_pengaduan',$id)
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori','admins.nama_petugas','tanggapans.*')
            ->first();
        date_default_timezone_set('Asia/Makassar');
        $todayDate = date("d/m/Y");

        $pdf = PDF::loadView('tanggapan.detailriwayat_pdf', compact('pengaduan'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Detail Pengaduan - '.$todayDate.'.pdf');
    }

    public function editcetakpdf($id)
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->where('id_pengaduan',$id)
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori','admins.nama_petugas','tanggapans.*')
            ->first();
        date_default_timezone_set('Asia/Makassar');
        $todayDate = date("d/m/Y");

        $pdf = PDF::loadView('tanggapan.editpdf', compact('pengaduan'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Detail Pengaduan - '.$todayDate.'.pdf');
    }

    public function editcetakpdf2($id)
    {
        //status 0
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori')
            ->where('pengaduans.id',$id)
            ->get()
            ->first();
        date_default_timezone_set('Asia/Makassar');
        $todayDate = date("d/m/Y");

        $pdf = PDF::loadView('tanggapan.editpdf2', compact('pengaduan'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Detail Pengaduan - '.$todayDate.'.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        date_default_timezone_set('Asia/Makassar');
        $now = \Carbon\Carbon::now();

        $tanggapan = new Tanggapan();
        $tanggapan->tgl_tanggapan = $now;
        $tanggapan->tanggapan = $request->input('tanggapan');
        $tanggapan->id_pengaduan = $request->input('id_pengaduan');
        $tanggapan->id_admin = $request->input('id_admin');
        $tanggapan->save();

        $a = Pengaduan::findOrFail($request->id_pengaduan);
        $a->status = 'proses';
        $a->update();
        return redirect('/tanggapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->where('pengaduans.id',$id)
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori','admins.nama_petugas','tanggapans.*')
            ->first();

        return view('tanggapan.detailriwayat',compact('pengaduan','tanggapan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->leftJoin('tanggapans','tanggapans.id_pengaduan','=','pengaduans.id')
            ->leftJoin('admins','admins.id','=','tanggapans.id_admin')
            ->where('pengaduans.id',$id)
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori','tanggapans.*','admins.nama_petugas')
            ->first();

        $pengaduan2 = Pengaduan::leftJoin('masyarakats','masyarakats.nik','=','pengaduans.nik')
            ->leftJoin('kategoris','kategoris.id','=','pengaduans.id_kategori')
            ->where('pengaduans.id',$id)
            ->select('masyarakats.nama','pengaduans.*','kategoris.nama_kategori')
            ->first();
        
        return view('tanggapan.edit',compact('pengaduan','pengaduan2'));
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
        $a = Pengaduan::findOrFail($id);
        $a->status = 'selesai';
        $a->update();
        return redirect('/tanggapan');
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
