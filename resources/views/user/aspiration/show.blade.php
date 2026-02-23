@extends('layouts.templatepengguna')

@section('title', 'LaporKu | Detail Pengaduan')

@section('content')

<style>
    *{
        box-sizing:border-box;
        font-family:'Segoe UI', sans-serif;
    }

    .main{
        padding:25px;
    }

    h3{
        margin:0 0 6px;
    }

    .breadcrumb{
        font-size:14px;
        margin-bottom:20px;
    }

    .breadcrumb a{
        text-decoration:none;
        color:#111;
    }

    .breadcrumb .breadcrumb-active{
        color:red;
        font-weight:bold;
    }

    /* CARD */
    .card{
        background:#fff;
        border-radius:10px;
        padding:25px;
        box-shadow:0 2px 8px rgba(0,0,0,.05);
    }

    .card-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding-bottom:15px;
        border-bottom:1px solid #e5e7eb;
        margin-bottom:25px;
    }

    .card-header h4{
        margin:0;
    }

    .card-header small{
        color:#6b7280;
    }

    /* === TOMBOL HAPUS PENGADUAN === */
    .btn-hapus{
        background:#dc2626;
        color:#fff;
        border:none;
        padding:10px 18px;
        border-radius:8px;
        display:flex;
        align-items:center;
        gap:10px;
        font-size:15px;
        font-weight:600;
        cursor:pointer;
        box-shadow:0 2px 0 rgba(0,0,0,0.15);
    }

    .btn-hapus svg{
        width:20px;
        height:20px;
        stroke:#fff;
    }

    .btn-hapus:active{
        transform:translateY(1px);
    }

    .form-label{
        font-size:14px;
        font-weight:600;
        margin-bottom:16px;
    }

    .form-value{
        font-size:14px;
        color:#6b7280;
        margin-bottom:16px;
    }

    .form-textarea{
        width:100%;
        padding:16px 18px;
        border-radius:6px;
        border:1px solid #d1d5db;
        min-height:160px;
    }

    .tanggapan-full{
        grid-column:1 / -1;
    }

    /* FOOTER */
    .card-footer{
        margin-top:20px;
        background:#fff;
        border-radius:10px;
        padding:15px 25px;
        display:flex;
        justify-content:flex-end;
    }

    .btn-secondary{
        background:#8B8B8B;
        color:#fff;
        border:none;
        padding:6px 18px;
        border-radius:6px;
        font-size:14px;
        text-decoration:none;
    }

    /* ===== POPUP DELETE ===== */
    .modal-delete{
        position:fixed;
        inset:0;
        background:rgba(0,0,0,0.45);
        display:none;
        justify-content:center;
        align-items:center;
        z-index:9999;
    }

    .delete-box{
        background:#fff;
        width:460px;
        padding:30px 36px;
        border-radius:22px;
        text-align:center;
        box-shadow:0 20px 50px rgba(0,0,0,0.25);
    }

    .delete-icon-svg{
        margin-bottom:12px;
    }

    .delete-box h2{
        margin:0;
        font-size:22px;
        font-weight:700;
    }

    .delete-box p{
        font-size:14px;
        color:#6b7280;
        margin-top:8px;
    }

    .text-danger{
        color:#ef4444;
        font-weight:600;
    }

    .delete-btn-area{
        display:flex;
        justify-content:center;
        gap:16px;
        margin-top:26px;
    }

    .btn-cancel{
        padding:10px 26px;
        border-radius:12px;
        border:2px solid #ef4444;
        background:#fff;
        color:#ef4444;
        font-weight:600;
        cursor:pointer;
        transition:.2s;
    }

    .btn-cancel:hover{
        background:#fee2e2;
    }

    .btn-delete{
        padding:10px 32px;
        border-radius:12px;
        border:none;
        background:#dc2626;
        color:#fff;
        font-weight:600;
        cursor:pointer;
        transition:.2s;
    }

    .btn-delete:hover{
        background:#b91c1c;
    }

    /* ===== STATUS ===== */
    .status-wrapper {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 18px;
    }

    .status-title {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .status {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 550;
        display: inline-block;
        width: fit-content;
    }

    .menunggu {
        background: #fee2e2;
        color: #dc2626;
    }

    .proses {
        background: #ffedd5;
        color: #ea580c;
    }

    .selesai {
        background: #dcfce7;
        color: #16a34a;
    }

    .footer-card{
        margin-top:20px;
        padding:18px 25px;
        display:flex;
        justify-content:flex-end;
        align-items:center;
        background:#fff;
        border-radius:10px;
        box-shadow:0 2px 8px rgba(0,0,0,.05);
    }

    .content-wrapper{
        display:grid;
        grid-template-columns: 1fr 300px;
        gap:40px;
    }

    .detail-left{
        display:flex;
        flex-direction:column;
        gap: 0; /* HAPUS gap besar kalau ada */
    }

    .detail-row{
        display: flex;
        flex-direction: column;
        margin-bottom: 16px; /* sebelumnya 24px → terlalu jauh */
    }

    .form-label{
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 4px; /* sebelumnya 6px */
    }

    .form-value{
        font-size: 15px;
        color: #6b7280;
    }

    .detail-right{
        display:flex;
        flex-direction:column;
        gap:10px;
    }

    .bukti-img{
        width:100%;
        border-radius:10px;
        border:1px solid #e5e7eb;
        object-fit:contain;
    }

    .response-box{
        margin-top:6px;
        padding:16px;
        border-radius:8px;
        background:#f3f4f6;
        border:1px solid #e5e7eb;
        font-size:14px;
        line-height:1.6;
    }

</style>

<div class="page-wrapper">
    <div class="main">

    <h3>Detail Pengaduan</h3>

    <div class="breadcrumb">
        🏠 <a href="{{ route('user.dashboard') }}">Beranda</a> &gt;
        <a href="{{ route('pengaduan.mine') }}">Riwayat Pengaduan</a> &gt;
        <span class="breadcrumb-active">Detail Pengaduan</span>
    </div>

    <div class="card">

        <!-- HEADER -->
        <div class="card-header">
            <div>
                <h4>Laporan Pengaduan</h4>
                <small>Tanggapi laporan pengaduan.</small>
            </div>

            <form action="{{ route('pengaduan.destroy', $aspiration->id) }}"
                method="POST"
                id="deleteForm">

                @csrf
                @method('DELETE')

                <button class="btn-hapus" type="button" onclick="openDelete()">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                        <path d="M10 11v6"/>
                        <path d="M14 11v6"/>
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                    </svg>
                    Hapus Pengaduan
                </button>
            </form>
        </div>

        <!-- POPUP DELETE -->
        <div class="modal-delete" id="deleteModal">
            <div class="delete-box">

                <div class="delete-icon-svg">
                    <svg width="90" height="70" viewBox="0 0 64 48">
                        <path d="M4 10c0-2.2 1.8-4 4-4h14l4 4h26c2.2 0 4 1.8 4 4v20c0 2.2-1.8 4-4 4H8c-2.2 0-4-1.8-4-4V10z"
                              fill="#ef4444"/>
                        <rect x="36" y="16" width="20" height="20" rx="3" fill="#fecaca"/>
                        <rect x="42" y="22" width="2" height="10" fill="#ef4444"/>
                        <rect x="46" y="22" width="2" height="10" fill="#ef4444"/>
                        <rect x="34" y="14" width="24" height="3" fill="#ef4444"/>
                    </svg>
                </div>

                <h2>Hapus Pengaduan?</h2>

                <p>
                    Data yang Anda pilih akan dihapus <br>
                    secara <span class="text-danger">permanen</span>
                    dan laporan Anda akan terhapus.
                </p>

                <div class="delete-btn-area">
                    <button class="btn-cancel" onclick="closeDelete()">Batalkan</button>
                    <button class="btn-delete" onclick="submitDelete()">
                        Hapus
                    </button>
                </div>

            </div>
        </div>

        <!-- ISI -->
        <div class="content-wrapper">

    <!-- KIRI -->
    <div class="detail-left">

        <div class="detail-row">
            <div class="form-label">Nama</div>
            <div class="form-value">{{ $aspiration->name }}</div>
        </div>

        <div class="detail-row">
            <div class="form-label">Username</div>
            <div class="form-value">{{ $aspiration->user->name }}</div>
        </div>

        <div class="detail-row">
            <div class="form-label">Tanggal</div>
            <div class="form-value">
                {{ \Carbon\Carbon::parse($aspiration->date)->format('d-m-Y') }}
            </div>
        </div>

        <div class="detail-row">
            <div class="form-label">Kategori</div>
            <div class="form-value">
                {{ $aspiration->category->name ?? '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="form-label">Lokasi</div>
            <div class="form-value">{{ $aspiration->location }}</div>
        </div>

        <div class="detail-row">
            <div class="form-label">Keterangan</div>
            <div class="form-value">
                {{ $aspiration->description }}
            </div>
        </div>

        <div class="detail-row">
            <div class="form-label">Status</div>
            <div class="status-wrapper">
                @if($aspiration->status == 'menunggu')
                    <span class="status menunggu">Menunggu</span>
                @elseif($aspiration->status == 'diproses')
                    <span class="status proses">Diproses</span>
                @elseif($aspiration->status == 'selesai')
                    <span class="status selesai">Selesai</span>
                @else
                    <span class="status menunggu">Ditolak</span>
                @endif
            </div>
        </div>

        <div class="detail-row">
            <div class="form-label">Tanggapan</div>
            <div class="form-value">
                @if($aspiration->response)
                    <div class="response-box">
                        {{ $aspiration->response }}
                    </div>
                @else
                    <span style="color:#9ca3af;">Belum ada tanggapan</span>
                @endif
            </div>
        </div>

    </div>

    <!-- KANAN -->
    <div class="detail-right">
        <div class="form-label">Bukti</div>

        @if($aspiration->image)
            <img src="{{ asset('storage/' . $aspiration->image) }}"
                 class="bukti-img">
        @else
            <div class="form-value">Tidak ada bukti</div>
        @endif
    </div>
    </div>

    </div>

</div>

<!-- CARD TOMBOL KEMBALI -->
<div class="card footer-card">
    <a href="{{ route('pengaduan.mine') }}" class="btn-secondary">
        Kembali
    </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdown = document.getElementById('dropdownStatus');
    if (!dropdown) return;

    const btn = document.getElementById('dropdownBtn');
    const content = dropdown.querySelector('.dropdown-content');

    /* === BUKA / TUTUP DROPDOWN === */
    btn.addEventListener('click', function (e) {
        e.stopPropagation();

        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            content.style.display = 'block';
        }
    });

    /* === PILIH ITEM DROPDOWN === */
    content.querySelectorAll('div').forEach(item => {
        item.addEventListener('click', function (e) {
            e.stopPropagation();

            btn.innerHTML = this.textContent + ' <span>▼</span>';
            content.style.display = 'none';
        });
    });

    /* === KLIK DI LUAR DROPDOWN === */
    document.addEventListener('click', function () {
        content.style.display = 'none';
    });

});

/* ===== MODAL DELETE ===== */
function openDelete(){
    document.getElementById('deleteModal').style.display='flex';
}

function closeDelete(){
    document.getElementById('deleteModal').style.display='none';
}

function submitDelete(){
    document.getElementById('deleteForm').submit();
}
</script>


@endsection
