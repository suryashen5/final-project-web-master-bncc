@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br>
                <div class="tengah">
                    <h2 class="text">Welcome to Go-ber Library.</h2>
                    <br/>
                    @if(Auth::guest())
                    <div>
                        <a name="login" id="" class="btn btn-primary" href="{{ url('/login') }}" role="button">Login</a>
                        <a name="register" id="" class="btn btn-primary" href="{{ url('/register') }}" role="button">Register</a>
                    </div>
                    @else
                    <div>
                        <a name="continue" id="" class="btn btn-primary" href="{{ url('/home') }}" role="button">Continue</a>
                    </div>
                    @endif
                </div>   
        </div>
    </div>
</div>
@endsection
