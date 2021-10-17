@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pembeli</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/pembeli/create" class="btn btn-dark btn-outline-primary border-0 mb-3 text-decoration-none">Create new post</a>
        <table id="tbl-pelanggan" class="table table-striped table-lg">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">KTP</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Telepon</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pembelis as $pembeli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembeli->ktp_pembeli }}</td>
                    <td>{{ $pembeli->nama_pembeli }}</td>
                    <td>{{ $pembeli->alamat_pembeli }}</td>
                    <td>{{ $pembeli->telp_pembeli }}</td>
                    <td>
                        <a href="/dashboard/pembeli/show" class="badge bg-info"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/pembeli/{{ $pembeli->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ url('dashboard/pembeli/'.$pembeli->id) }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

@endsection
