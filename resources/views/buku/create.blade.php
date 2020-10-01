@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Buku</div>
                <div class="panel-body isi">
                    <a class="btn btn-danger" href="{{ route('buku.index') }}">Kembali</a>
                    <br /><br />
                    {!! Form::open(array('route' => 'buku.store','method'=>'POST')) !!}
                        @include('buku.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection