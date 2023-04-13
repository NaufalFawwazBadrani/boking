@extends('app')
@section('content')
<form action="{{ route('positions.update',$position->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>position Name:</strong>
                <input type="text" name="name" value="{{ $position->name }}" class="form-control" placeholder="position name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> keterangan:</strong>
                <input type="keterangan" name="keterangan" class="form-control" placeholder="position keterangan" value="{{ $position->keterangan }}">
                @error('keterangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> alias:</strong>
                <input type="text" name="alias" value="{{ $position->alias }}" class="form-control" placeholder="position alias">
                @error('alias')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-end mb-2">
      <p></p>
    <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-warning text-end" href="{{ route('positions.index') }}"> Back</a>
    </div>
    </div>
</form>
@endsection