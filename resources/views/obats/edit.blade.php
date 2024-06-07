@extends('layouts.app')
@section('title', 'Edit Data Obat')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="mb-2 page-title">Edit Data Obat</h2>
                            <div class="row">
                                <!-- Small form -->
                                <div class="col-md-6 mx-auto">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="id_obat">ID Obat</label>
                                                    <input type="text" id="id_obat" name="id_obat" class="form-control" value="{{ $obat->id_obat }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $obat->nama }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori_id">Kategori</label>
                                                    <select id="kategori_id" name="kategori_id" class="form-control" required>
                                                        @foreach($kategoris as $kategori)
                                                            <option value="{{ $kategori->id }}" {{ $kategori->id == $obat->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                                                    <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" class="form-control" value="{{ $obat->tanggal_kadaluarsa }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stok">Stok Tersedia</label>
                                                    <input type="number" id="stok" name="stok" class="form-control" value="{{ $obat->stok }}" required>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- small form -->
                            </div> <!-- end section -->
                        </div> <!-- .col-12 -->
                    </div> <!-- .row -->
                </div> <!-- .container-fluid -->

    @endsection
