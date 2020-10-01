@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Buku</div>
                <div class="panel-body isi">
                    <a class="btn btn-danger" href="{{ route('buku.index') }}">Kembali</a>
                    <br /><br />
                    {!! Form::model($bukus, ['method' => 'PATCH','route' => ['buku.update', $bukus->id]]) !!}
                        @include('buku.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection