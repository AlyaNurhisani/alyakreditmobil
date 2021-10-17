@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input New Data</h1>
    </div>

    <div class="contact-form col-lg-4">
        <form action="{{ url('dashboard/pembeli/'.$pembeli->id) }}" method="POST" class="mb-5">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="ktp_pembeli" class="form-label">KTP Pembeli</label>
              <input type="text" class="form-control @error('ktp_pembeli') is-invalid @enderror" id="ktp_pembeli" name="ktp_pembeli" required autofocus value="{{ old('ktp_pembeli', $pembeli->ktp_pembeli) }}">
              @error('ktp_pembeli')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
              <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror" id="nama_pembeli" name="nama_pembeli" required value="{{ old('nama_pembeli', $pembeli->nama_pembeli) }}">
              @error('nama_pembeli')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="alamat_pembeli" class="form-label">Alamat Pembeli</label>
              <input type="text" class="form-control @error('alamat_pembeli') is-invalid @enderror" id="alamat_pembeli" name="alamat_pembeli" required value="{{ old('alamat_pembeli', $pembeli->alamat_pembeli) }}">
              @error('alamat_pembeli')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="telp_pembeli" class="form-label">No Telepon Pembeli</label>
              <input type="text" class="form-control @error('telp_pembeli') is-invalid @enderror" id="telp_pembeli" name="telp_pembeli" required value="{{ old('telp_pembeli', $pembeli->telp_pembeli) }}">
              @error('telp_pembeli')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-dark btn-outline-primary border-0">Edit Data</button>
          </form>
    </div>

@endsection
