@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Edit Data diri</h1>
        <form action={{ route('posts.update', $posts->id) }} method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="">
                @if ($errors->has('nama'))
                <span class="text-danger"> Nama belum di isi </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="">
                @if ($errors->has('alamat'))
                <span class="text-danger"> alamat belum di isi </span>
                @endif
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Email:</label>
                <input type="text" name="email" id="email" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Nomor Wa:</label>
                <input type="number" name="nomor_wa" id="nomor_wa" class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> { { $error } } </li>
        @endforeach
    </ul>
@endif
        </form>
    </div>
@endsection
