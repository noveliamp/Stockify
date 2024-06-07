@extends('layouts.app')
@section('title', 'Edit Data Barang Keluar')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Edit Data Barang Keluar</h2>
                    <div class="row">
                        <!-- Small form -->
                        <div class="col-md-6 mx-auto">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form action="{{ route('barang-keluar.update', $barangKeluar->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="obat_id">Obat</label>
                                            <select id="obat_id" name="obat_id" class="form-control" required>
                                                @foreach($obats as $obat)
                                                    <option value="{{ $obat->id }}" {{ $obat->id == $barangKeluar->obat_id ? 'selected' : '' }}>{{ $obat->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori_id">Kategori</label>
                                            <select id="kategori_id" name="kategori_id" class="form-control" required>
                                                @foreach($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $barangKeluar->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ $barangKeluar->jumlah }}" required>
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
    </main>
@endsection
