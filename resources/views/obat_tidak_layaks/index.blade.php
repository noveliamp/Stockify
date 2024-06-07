@extends('layouts.app')
@section('title', 'Obat Tidak Layak')
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
                            <h2 class="mb-2 page-title">Data Obat Tidak Layak</h2>
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Obat</th>
                                                        <th scope="col">Keterangan Tidak Layak</th>
                                                        <th scope="col">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($obatTidakLayaks as $index => $obatTidakLayak)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $obatTidakLayak->obat->nama }}</td>
                                                            <td>{{ $obatTidakLayak->keterangan_tidak_layak }}</td>
                                                            <td>{{ $obatTidakLayak->jumlah }}</td>
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
