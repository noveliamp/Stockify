@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-2">
                        <!-- Form search dan filter -->
                        <!-- ... -->
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="mb-2 page-title">Data Obat</h2>
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table datatables" id="dataTable-1">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Id Obat</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Tanggal Kadaluarsa</th>
                                                        <th>Stok Tersedia</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($obats as $index => $obat)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $obat->id_obat }}</td>
                                                            <td>{{ $obat->nama }}</td>
                                                            <td>{{ $obat->kategori ? $obat->kategori->nama : '-' }}</td>
                                                            <td>{{ $obat->tanggal_kadaluarsa }}</td>
                                                            <td>{{ $obat->stok }}</td>
                                                            <td>
                                                                <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning">Edit</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->
                        </div> <!-- .col-12 -->
                    </div> <!-- .row -->
                </div> <!-- .container-fluid -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    @endsection
