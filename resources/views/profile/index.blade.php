@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>
                <div class="panel-body isi">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <p>Nama: {{Auth::user()->name}}</p>
                <p>Email: {{Auth::user()->email}}</p>
                <a class="btn btn-primary" href="{{ route('profile.edit',Auth::user()->id) }}">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
