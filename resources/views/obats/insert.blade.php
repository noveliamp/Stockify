@extends('layouts.app')
@section('title', 'Tambah Obat')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <h2>Tambah Obat</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('obat.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select id="kategori_id" name="kategori_id" class="form-control" required>
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_obat">ID Obat</label>
                                    <input type="text" id="id_obat" name="id_obat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                                    <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
