@extends('layouts.main')

@section('container')
<h1>Silahkan isi data diri anda untuk menghadiri acara</h1>
<!-- START FORM -->
<form action='{{ url('home') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomorkontak" class="col-sm-2 col-form-label">Nomor Kontak</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nomorkontak' id="nomorkontak">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      </form>
    </div>
    <font color="green"><a href='/home'> Kembali </font>
    <!-- AKHIR FORM -->
@endsection
