<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjam;
use App\Buku;
use App\User;

class PinjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $pinjams= Pinjam::orderBy('status')->paginate(10);
        return view('pinjam.index',compact('pinjams'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function kembali($id1,$id2)
    {
        $pinjams = Pinjam::find($id1);
        $bukus = Buku::find($id2);

        $pinjams->update([
            'status' => 'kembali'
        ]);

        $bukus->update([
            'pinjam' => 0
        ]);
    
        return redirect()->route('pinjam.index')
                        ->with('success','Buku telah dikembalikan');
    }
}
