<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Pinjam;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bukus= Buku::orderBy('nama')->paginate(10);
        return view('buku.index',compact('bukus'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'tahun_terbit' => 'required',
            'kategori' => 'required',
        ]);
        Buku::create($request->all());
        return redirect()->route('buku.index')
                        ->with('success','Tambah buku sukses');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bukus= Buku::find($id);
        return view('buku.edit',compact('bukus'));
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
        $this->validate($request, [
            'nama' => 'required',
            'tahun_terbit' => 'required',
            'kategori' => 'required',
        ]);
        Buku::find($id)->update($request->all());
        return redirect()->route('buku.index')
                        ->with('success','Update buku sukses');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        return redirect()->route('buku.index')
                        ->with('success','Hapus buku sukses');
    }

    public function pinjam($id)
    {

        $bukus = Buku::find($id);
        $bukus->update([
            'pinjam'=> 1
        ]);

        Pinjam::create([
            'id_user' => (Auth::user()->id),
            'buku_pinjam' => ($bukus->nama),
            'id_buku' => ($bukus->id),
            'status' => 'pinjam'
        ]);

        return redirect()->route('buku.index')
                        ->with('success','Buku berhasil dipinjam');                   
    }
}