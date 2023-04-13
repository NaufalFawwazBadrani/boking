@extends('layout')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required/>
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" required/>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
            </div>
            <div>
            <p>Anda belum memiliki akun ? <a href="{{ route('register') }}">Register</a> Sekarang !</p>
            </div>
        </form>
    </div>
</div>
@endsection