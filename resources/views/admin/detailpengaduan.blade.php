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

    /* CARD */
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
        display: flex;
        align-items: center;
        gap: 4px;
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
        width: 138%;
        padding: 15px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
    }

    /* CUSTOM DROPDOWN STATUS */
    .dropdown {
        position: relative;
        display: inline-block;
        cursor: pointer;
        width: 200px;
    }

    .dropdown-btn {
        width: 100%;
        padding: 10px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background-color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        left: 100%; /* muncul ke samping kanan */
        top: 0;
        background-color: #fff;
        min-width: 140px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        z-index: 100;
    }

    .dropdown-content div {
        padding: 8px 12px;
        cursor: pointer;
    }

    .dropdown-content div:hover {
        background-color: #f0f0f0;
    }

    /* FOOTER BUTTON */
    .card-footer {
        margin-top: 20px;
        background: #fff;
        border-radius: 10px;
        padding: 15px 25px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        box-shadow: none;
    }

    .btn {
        padding: 6px 18px;
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

    /* CETAK PDF */
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
       <a href="{{ route('admin.detailpengaduan') }}"></a>

        <span class="active">Detail Pengaduan</span>
    </div>

    <!-- AREA CETAK -->
    <div class="print-area">

        <div class="card">

            <div class="card-header">
                <div>
                    <h4>Laporan Pengaduan</h4>
                    <small>Tanggapi laporan pengaduan.</small>
                </div>

                <button class="export-btn no-print" onclick="window.print()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M12 16V4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M8 8l4-4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 18c0 2.5 3.6 4 8 4s8-1.5 8-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Export
                </button>
            </div>

            <div style="display:grid;grid-template-columns:1fr 280px;gap:30px;">
                <div>
                    <div class="form-label">Nama</div>
                    <div class="form-value">Aldrich Aditya Pramudya Putra</div>

                    <div class="form-label">Tanggal</div>
                    <div class="form-value">12-10-2026</div>

                    <div class="form-label">Kategori</div>
                    <div class="form-value">Kelas</div>

                    <div class="form-label">Lokasi</div>
                    <div class="form-value">Kelas XII-RPL 2</div>

                    <div class="form-label">Keterangan</div>
                    <div class="form-value" style="line-height:1.7;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>

                    <div class="form-label">Status</div>
                    <div class="dropdown" id="dropdownStatus">
                        <div class="dropdown-btn" id="dropdownBtn">
                            Proses <span>▼</span>
                        </div>
                        <div class="dropdown-content">
                            <div data-value="Menunggu">Menunggu</div>
                            <div data-value="Proses">Proses</div>
                            <div data-value="Selesai">Selesai</div>
                        </div>
                    </div>

                    <br><br>

                    <div class="form-label">Tanggapan</div>
                    <textarea class="form-textarea" id="tanggapanPengaduan" rows="5"></textarea>

                </div>

                <div>
                    <div class="form-label">Bukti</div>
                    <img src="{{ asset('images/bukti.png') }}" style="width:100%;border-radius:10px;border:1px solid #e5e7eb;">
                </div>
            </div>

        </div>
        <!-- END CARD -->

    </div>
    <!-- END PRINT AREA -->

    <!-- FOOTER BUTTON -->
    <div class="card-footer">
        <a href="{{ route('admin.daftarpengaduan') }}" class="btn btn-secondary">Batal</a>
        <button class="btn btn-primary">Kirim</button>
    </div>

</div>

<script>
    // Dropdown status
    const dropdown = document.getElementById('dropdownStatus');
    const btn = document.getElementById('dropdownBtn');
    const content = dropdown.querySelector('.dropdown-content');

    btn.addEventListener('click', function(e){
        e.stopPropagation();
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
    });

    content.querySelectorAll('div').forEach(item=>{
        item.addEventListener('click', function(){
            btn.innerHTML = this.textContent + ' <span>▼</span>';
            content.style.display = 'none';
        });
    });

    document.addEventListener('click', function(){
        content.style.display = 'none';
    });
</script>

@endsection