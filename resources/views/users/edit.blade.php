@extends('home')
@section('content')

<form action="{{ route('users.update', $user->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $user->name}}" class=" form-control" placeholder="Nama">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                <input type="text" name="email" value="{{ $user->email}}" class="form-control" placeholder="email">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password :</strong>
                <input type="text" name="password" value="{{ $user->password}}" class="form-control" placeholder="password">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Posisi :</strong>
                <select name="positions" class="form-select">
                    @foreach ($positions as $positions)
                    <option value="{{ $positions->id}}" {{($user->positions == $positions->name) ? 'selected' : ''}}>{{$positions->name}}</option>
                    @endforeach
                </select>
                @error('positions')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <strong>Departements :</strong>
                <select name="departements" class="form-select">
                    @foreach ($departements as $departements)
                    <option value="{{ $departements->id}}" {{($user->departements == $departements->name) ? 'selected' : ''}}>{{$departements->name}}</option>
                    @endforeach
                </select>
                @error('departements')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection