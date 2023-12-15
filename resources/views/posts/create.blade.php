@extends('layouts.main')

@section('container')
<h1>Silahkan isi data diri anda untuk menghadiri acara</h1>
<!-- START FORM -->
<form action='{{ url('posts') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama"
                placeholder="Tulis Nama Lengkap">
                @if ($errors->has('nama'))
                    <span class="text-danger"> Nama belum di isi </span>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' id="alamat"
                placeholder="Tulis Alamat Lengkap">
                @if ($errors->has('alamat'))
                    <span class="text-danger"> Alamat belum di isi </span>
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='email' id="email"
                placeholder="Tulis E-Mail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomorkontak" class="col-sm-2 col-form-label">Nomor Kontak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nomor_wa' id="nomor_wa"
                placeholder="Tulis Nomor Whatsapp">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </div>
        @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> { { $error } } </li>
        @endforeach
    </ul>
@endif
      </form>
    </div>
    <a href='/posts'> Kembali </font>
    <!-- AKHIR FORM -->
@endsection
