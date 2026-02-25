@extends('layouts.templateadmin')

@section('title', 'LaporKu | Detail Pengaduan')

@section('content')

<style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    .main {
        padding: 25px;
    }

    h3 {
        margin: 0 0 6px;
    }

    .breadcrumb {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .breadcrumb a {
        text-decoration: none;
        color: #111;
    }

    .breadcrumb .active {
        color: red;
        font-weight: bold;
    }

    .card {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,.05);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding-bottom: 15px;
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 25px;
    }

    .card-header h4 {
        margin: 0;
    }

    .card-header small {
        color: #6b7280;
    }

    .export-btn {
        padding: 6px 12px;
        border: 1px solid #d1d5db;
        background: transparent;
        border-radius: 6px;
        cursor: pointer;
    }

    .form-label {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .form-value {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 16px;
    }

    .form-select, .form-textarea {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        margin-bottom: 16px;
    }

    .card-footer {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn {
        padding: 8px 18px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-secondary {
        background: #8B8B8B;
        color: #fff;
    }

    .btn-primary {
        background: #003D80;
        color: #fff;
    }

    @media print {
        body * { visibility: hidden; }
        .print-area, .print-area * { visibility: visible; }
        .no-print { display: none !important; }
        .print-area { position: absolute; left: 0; top: 0; width: 100%; }
        .card { box-shadow: none; border-radius: 0; }
    }
</style>

<div class="main">

    <h3>Detail Pengaduan</h3>

    <div class="breadcrumb">
        <a href="{{ route('aspiration.index') }}">Daftar Pengaduan</a>
        /
        <span class="active">Detail Pengaduan</span>
    </div>

    <div class="print-area">

        <form action="{{ route('aspiration.update', $aspiration->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">

                <div class="card-header">
                    <div>
                        <h4>Laporan Pengaduan</h4>
                        <small>Tanggapi laporan pengaduan.</small>
                    </div>

                    <a href="{{ route('aspirations.export', $aspiration->id) }}" class="export-btn no-print">
                        Export PDF
                    </a>
                </div>

                <div style="display:grid;grid-template-columns:1fr 280px;gap:30px;">

                    <div>

                        <div class="form-label">Username</div>
                        <div class="form-value">
                            {{ $aspiration->user->name ?? '-' }}
                        </div>

                        <div class="form-label">Tanggal</div>
                        <div class="form-value">
                            {{ \Carbon\Carbon::parse($aspiration->date)->format('d-m-Y') }}
                        </div>

                        <div class="form-label">Kategori</div>
                        <div class="form-value">
                            {{ $aspiration->category->name ?? '-' }}
                        </div>

                        <div class="form-label">Lokasi</div>
                        <div class="form-value">
                            {{ $aspiration->location }}
                        </div>

                        <div class="form-label">Keterangan</div>
                        <div class="form-value" style="line-height:1.7;">
                            {{ $aspiration->description }}
                        </div>

                        <div class="form-label">Status</div>
                        <select name="status" class="form-select">
                            <option value="menunggu" {{ $aspiration->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ $aspiration->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $aspiration->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditolak" {{ $aspiration->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>

                        <div class="form-label">Tanggapan</div>
                        <textarea name="response" class="form-textarea" rows="5">{{ $aspiration->response }}</textarea>

                        <div class="card-footer no-print">
                            <a href="{{ route('aspiration.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>

                    </div>

                    <div>
                        <div class="form-label">Bukti</div>

                        @if($aspiration->image)
                            <img src="{{ asset('storage/' . $aspiration->image) }}"
                                 style="width:100%;border-radius:10px;border:1px solid #e5e7eb;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection
