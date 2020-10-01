@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profil</div>
                    <div class="panel-body isi">
                        <a class="btn btn-danger" href="{{ route('profile.index') }}">Kembali</a>
                        <br /><br />
                        {!! Form::model($users, ['method' => 'PATCH','route' => ['profile.update', Auth::user()->id]]) !!}
                            @include('profile.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection