@extends('app')
@section('content')
  <form action="{{ route('departements.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                  @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Location:</strong>
                  <input type="text" name="location" class="form-control" placeholder="Lokasi Tinggal">
                  @error('location')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Manager ID:</strong>
                  <select name="manager_id" class="form-control">
                  @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}">{{$manager->name}}</option>
                    @endforeach
                  </select>
                  @error('manager_id')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <div class="col-lg-12 margin-tb">
    <div class="text-end mb-2">
      <p></p>
    <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-warning text-end" href="{{ route('departements.index') }}"> Back</a>
    </div>
  </div>
</div>
      </div>
  </form>
@endsection