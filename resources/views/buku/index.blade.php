@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Koleksi Buku</div>
                <div class="panel-body isi">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('pinjam'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if(Auth::user()->jabatan=='ADMIN')
                    <a class="btn btn-success" href="{{ route('buku.create') }}">Tambah Buku</a>
                    <br /><br />
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                            @if(Auth::user()->jabatan=='ADMIN')
                            <th>Status</th>
                            @endif
                            <th width="280px">Actions</th>
                        </tr>
                        @foreach ($bukus as $buku)
                        @if($buku->pinjam == 1&&Auth::user()->jabatan=='USER')
                        @else
                        <tr>    
                            <td>{{ $buku->nama}}</td>
                            <td>{{ $buku->tahun_terbit}}</td>
                            <td>{{ $buku->kategori}}</td>
                            @if(Auth::user()->jabatan=='ADMIN')
                            @if($buku->pinjam == 1)
                            <td>Sedang dipinjam</td>
                            @else
                            <td>Tidak dipinjam</td>
                            @endif
                            @endif
                            <td>
                                @if(Auth::user()->jabatan == 'ADMIN'&&$buku->pinjam == 0)
                                <a class="btn btn-primary" href="{{ route('buku.edit',$buku->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['buku.destroy', $buku->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @elseif(Auth::user()->jabatan == 'USER')
                                {!! Form::open(['route' => ['buku.pinjam',$buku->id],'method'=>'POST','style'=>'display:inline','onsubmit' => 'return confirm("Apakah kamu yakin?")']) !!}
                                {!! Form::submit('Pinjam', ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                                @else
                                Anda dapat mengedit atau menghapus buku tersebut jika sudah dikembalikan
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </table>
                        {!! $bukus->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection