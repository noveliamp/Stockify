@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="col">
                        <h2 class="h5 page-title">Welcome!</h2>
                    </div>
                    <div class="row align-items-center mb-2 ml-1">
                        <!-- Data Obat -->
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Data Obat</p>
                                            <span class="h3 mb-0">{{ $jumlahObat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Kategori -->
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Data Kategori</p>
                                            <span class="h3 mb-0">{{ $jumlahKategori }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Obat Tidak Layak -->
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary">
                                                <i class="fe fe-16 fe-filter text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">Data Obat Tidak Layak</p>
                                            <span class="h3 mb-0">{{ $jumlahObatTidakLayak }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obats as $index => $obat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $obat->id_obat }}</td>
                                                <td>{{ $obat->nama }}</td>
                                                <td>{{ $obat->kategori ? $obat->kategori->nama : '-' }}</td>
                                                <td>{{ $obat->tanggal_kadaluarsa }}</td>
                                                <td>{{ $obat->stok }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->

                </div>
            </div>
        </div>
    </main>
@endsection
@section('notif')
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group list-group-flush my-n3">
                        @forelse($lowStockObats as $obat)
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>stok obat {{ $obat->nama }} menipis! </strong></small>
                                        <div class="my-0 text-muted small">Tersisa {{ $obat->stok }} stok</div>
                                        <small
                                            class="badge badge-pill badge-light text-muted">{{ $obat->updated_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-check fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>No low stock notifications</strong></small>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('logo-notif')
    <li class="nav-item nav-notif">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
            <span class="fe fe-bell fe-16"></span>
            @if ($lowStockObats->isNotEmpty())
                <span class="dot dot-md bg-success"></span>
            @endif
        </a>
    </li>
@endsection
