@extends('home')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="text-end mb-2">
  <a class="btn btn-success" style="margin-top: 20px;" href="{{ route('jadwals.create') }}">Add Jadwal</a>
</div>
<br>
<table class="table table-success table-striped">
  <thead>
  <tbody class="table-succes ">
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Boking</th>
      <th scope="col">Tribun</th>
      <th scope="col">Kelas</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Aksi</th>
    </tr>
    </thead>
  <tbody>
    @php $no = 1 @endphp
    @foreach ($jadwals as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->no_boking }}</td>
      <td>{{ $data->tribun }}</td>
      <td>{{ $data->kelas }}</td>
      <td>{{ $data->tanggal }}</td>
      <td>
        <form action="{{ route('jadwals.destroy',$data->id) }}" method="Post">
          <a class="btn btn-warning" href="{{ route('jadwals.edit',$data->id) }}">Edit</a>
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
@section('js')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endsection