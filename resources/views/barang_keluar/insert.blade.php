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
                            <form action="{{ route('barang-keluar.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="obat_id">Nama</label>
                                    <select id="obat_id" name="obat_id" class="form-control" required>
                                        @foreach ($obats as $obat)
                                            <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select id="kategori_id" name="kategori_id" class="form-control" required>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control" required>
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
