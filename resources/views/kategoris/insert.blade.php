@extends('layouts.app')
@section('title', 'Tambah Kategori Obat')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <h2>Tambah Kategori</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('kategoris.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Kategori</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
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
