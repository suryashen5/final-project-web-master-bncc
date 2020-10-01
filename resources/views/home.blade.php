@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body isi">
                    <h5>Welcome, {{Auth::user()->name}}!</h5>
                    <h5>Anda bisa meminjam buku melalui bagian "Buku"</h5>
                    @if(Auth::user()->jabatan == 'USER')
                    <h5>Anda bisa mengembalikan buku atau melihat buku yang sedang dipinjam melalui bagian "Peminjaman"</h5>
                    @endif
                    <h5>Anda bisa mengedit profil anda melalui bagian "Profil" yang berada dalam dropdown "{{Auth::user()->name}}" yang berposisi di kanan atas</h5>
                    <h5>Enjoy!</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
