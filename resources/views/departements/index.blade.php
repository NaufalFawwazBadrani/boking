@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="text-end mb-2">
  <a class="btn btn-success" href="{{ route('departements.create') }}"> Create Departement</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">location</th>
      <th scope="col">manager_id</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php $no = 1 @endphp
    @foreach ($departements as $data)
    <tr>
      <td>{{ $no ++ }}</td>
      <!-- <td>{{ $data->id }}</td> -->
      <td>{{ $data->name }}</td>
      <td>{{ $data->location }}</td>
      <td>                 
         @foreach ($managers->slice(0, 1) as $manager)
              <selected value="{{ $manager->id }}">{{$manager->name}}</selected>
         @endforeach</td>
      <td>
        <form action="{{ route('departements.destroy',$data->id) }}" method="Post">
          <a class="btn btn-primary" href="{{ route('departements.edit',$data->id) }}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection