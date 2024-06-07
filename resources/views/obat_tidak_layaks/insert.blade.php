@extends('layouts.app')
@section('title', 'Tambah Obat Tidak Layak')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title">Tambah Obat Tidak Layak</h2>
                            <form action="{{ route('obattidaklayak.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="obat_id">Obat</label>
                                    <select id="obat_id" name="obat_id" class="form-control" required>
                                        <option value="">Pilih Obat</option>
                                        @foreach($obats as $obat)
                                            <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_tidak_layak">Keterangan Tidak Layak</label>
                                    <input type="text" id="keterangan_tidak_layak" name="keterangan_tidak_layak" class="form-control" required>
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
