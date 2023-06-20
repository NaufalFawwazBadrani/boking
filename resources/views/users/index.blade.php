@extends('home')
@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hai {{ Auth()->user()->name }} </strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="text-end mb-2">
  <!-- <a class="btn btn border border" href="department/exportPdf" target="_blank">
        <i class="nav-icon fas fa-print"></i>
    </a> -->
  <a class="btn btn-light" href="{{ route('users.exportpdf') }}"> Cetak</a>
  <a class="btn btn-success" href="{{ route('users.create') }}"> Add User</a>
</div>

<table id="example" class="table table-hover" style="width:100%">
  <thead class="thead-dark">
    <tr class="table-active">
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Posisi</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach ($users as $user)
    <tr class="table-hover-color">
      <td>{{ $i++ }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->password }}</td>
      <td>{{(isset($user->positions->name))?$user->positions->name :'Tidak Ada'}}</td>
      <td>{{(isset($user->departements->name))?$user->departements->name :'Tidak Ada'}}</td>
      <td>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: flex; justify-content: flex-start;">
          <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" style="margin-left: 5px;">Delete</button>
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