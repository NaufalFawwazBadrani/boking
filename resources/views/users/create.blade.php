@extends('home')
@section('content')

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                <input type="text" name="email" class="form-control" placeholder="Masukan Email">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <strong>Password :</strong>
                <input type="text" name="password" class="form-control" placeholder="Masukan password">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <label for="positions"><strong>Posisi :</strong></label>
            <select name="positions" class="form-select">
                @foreach ($positions as $positions)
                <option value="{{ $positions->id}}">{{$positions->name}}</option>
                @endforeach
            </select>

            <label for="departements"><strong>Departement :</strong></label>
            <select name="departements" class="form-select">
                @foreach ($departements as $departements)
                <option value="{{ $departements->id}}">{{$departements->name}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection