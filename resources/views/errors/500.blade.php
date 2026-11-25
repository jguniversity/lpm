@extends('layouts.authentication.master')
@section('title', 'Reset Password')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div><a class="logo" href="{{ route('index') }}">
                            <img class="img-fluid" style="max-width: 50%;" src="{{asset('assets/images/cartoon.png')}}"
                                alt="looginpage"></a>
                    </div>
                    <div class="login-main text-center">
                        <h1>404</h1>
                        <h6>Server Error</h6>
                        <span>The server couldn't finish processing your request due to an error.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

