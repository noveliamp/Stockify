@extends('layouts.app')
@section('title', 'Daftar Obat Keluar')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <h2>Daftar Barang Keluar</h2>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangKeluars as $barangKeluar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barangKeluar->obat->nama }}</td>
                                            <td>{{ $barangKeluar->kategori->nama }}</td>
                                            <td>{{ $barangKeluar->jumlah }}</td>
                                            <td>
                                                <a href="{{ route('barang-keluar.edit', $barangKeluar->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('barang-keluar.destroy', $barangKeluar->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
