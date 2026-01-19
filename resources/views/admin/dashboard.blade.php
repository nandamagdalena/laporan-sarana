@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-header {
        background: linear-gradient(45deg, #1dc4e9, #1de9b6);
        color: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }

    .dashboard-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,.05);
    }

    .dashboard-icon {
        font-size: 32px;
        color: #1dc4e9;
    }
</style>

<div class="dashboard-header mb-4">
    <h4 class="fw-bold mb-1">Dashboard Minimart</h4>
    <p class="mb-0">Kelola transaksi dan stok dengan mudah.</p>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card dashboard-card">
            <div class="card-body">

                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-store dashboard-icon mr-3"></i>
                    <h5 class="mb-0 font-weight-bold">Fitur Utama</h5>
                </div>

                <ul class="pl-3">
                    <li>Kelola <strong>Nama Transaksi</strong></li>
                    <li>Catat <strong>Pemasukan & Pengeluaran</strong></li>
                    <li>Pantau <strong>Stok Barang</strong></li>
                </ul>

            </div>
        </div>
    </div>

</div>

@endsection
