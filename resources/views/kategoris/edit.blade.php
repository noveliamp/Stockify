@extends('layouts.app')
@section('title', 'Edit Kategori Obat')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <h2>Edit Kategori</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama Kategori</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
