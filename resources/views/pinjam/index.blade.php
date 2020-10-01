@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Peminjaman</div>
                <div class="panel-body isi">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>Buku</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($pinjams as $pinjam)
                        @if($pinjam->id_user==Auth::user()->id)
                        <tr>
                            <td>{{Auth::user()->name}}</td>
                            <td>{{$pinjam->buku_pinjam}}</td>
                            @if($pinjam->status == 'pinjam')
                            <td>Sedang dipinjam</td>
                            <td>
                                {!! Form::open(['method' => 'POST','route' => ['pinjam.kembali', $pinjam->id, $pinjam->id_buku],'style'=>'display:inline','onsubmit' => 'return confirm("Apakah kamu yakin?")']) !!}
                                {!! Form::submit('Kembali', ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </td>
                            @else
                            <td>Sudah dikembalikan</td>
                            <td></td>
                            @endif
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
