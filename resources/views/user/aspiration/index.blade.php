@extends('layouts.templatepengguna')

@section('content')

    <style>
        /* RESET */
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
        }

        body {
            background: #f4f6f9;
            overflow-x: hidden;
        }

        /* WRAPPER */
        .wrapper {
            min-height: 100vh;
            width: 100%;
        }

        /* CONTENT */
        .content {
            width: 100%;
            min-height: 100vh;
        }

        /* MAIN */
        .main {
            padding: 25px;
            width: 100%;
            background: #f4f6f9;
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
            min-height: auto;
        }

        /* SEARCH */
        .search-bar{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:16px;
        }

        .search-box{
            position:relative;
            width:260px;
        }

        .search-box input{
            width:100%;
            padding:8px 12px 8px 34px;
            border:1px solid #d1d5db;
            border-radius:8px;
            font-size:13px;
            outline:none;
            background:#fff;
        }

        .search-box input:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 2px rgba(37,99,235,.15);
        }

        .search-icon{
            position:absolute;
            left:10px;
            top:50%;
            transform:translateY(-50%);
            color:#9ca3af;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        thead {
            background: #0059A8;
            color: #fff;
        }

        th, td {
            padding: 12px 10px;
            font-size: 14px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        /* STATUS */
        .status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
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

        /* AKSI */
        .aksi-eye {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            border: 3px solid #0059A8; /* LEBIH TEBAL */
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 0;
        }

        .aksi-eye svg {
            display: block;
        }

        .aksi-eye:hover {
            background: #e0ecff;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            font-size: 13px;
            color: #6b7280;
        }

        .page {
            display: flex;
            gap: 6px;
        }

        .page span {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d1d5db;
            cursor: pointer;
        }

        .page .active {
            background: #f97316;
            color: #fff;
            border-color: #f97316;
        }

        .page .dots {
            width: auto;
            height: auto;
            border: none;
            border-radius: 0;
            padding: 0 4px;
            cursor: default;
            background: transparent;
        }

        .th-aksi {
            width: 70px;
            text-align: left;
            padding-left: 12px;
        }

        .filtered {
            display: none;
        }

        .hidePage {
            display: none;
        }


        /* FILTER BUTTON */
    .filter-btn{
        width:36px;
        height:36px;
        border-radius:8px;
        border:1px solid #d1d5db;
        background:#fff;
        cursor:pointer;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .filter-btn:hover{
        background:#f3f4f6;
    }

    /* FILTER POPUP */
    .filter-popup {
    position: absolute;
    right: 0;
    margin-top: 10px;
    width: 260px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    padding: 20px;
    z-index: 100;
    font-family: sans-serif;
}

/* Section */
.filter-title {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.filter-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    cursor: pointer;
    color: #555;
    transition: color 0.2s ease;
}

.filter-item:hover {
    color: #1e73be;
}

.filter-item input[type="checkbox"] {
    accent-color: #1e73be;
    width: 16px;
    height: 16px;
}

/* Footer */
.filter-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 18px;
    padding-top: 12px;
}

.btn-reset {
    font-size: 14px;
    color: #e53935;
    text-decoration: none;
    font-weight: 500;
}

.btn-reset:hover {
    text-decoration: underline;
}

.btn-apply {
    background: #1e73be;
    color: #fff;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.2s ease;
}

.btn-apply:hover {
    background: #155a94;
}
        .filter-section {
            border-bottom: 1px solid rgba(0,0,0,.1);
            padding-bottom: 10px;
        }

        .filter-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .btn-reset {
            background: none;
            border: none;
            color: #ef4444;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-apply {
            background: #0059A8;
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

    </style>

        <!-- MAIN -->
        <div class="main">
            <h3>Riwayat Pengaduan</h3>
            <div class="breadcrumb">
                🏠 <a href="{{ route('user.dashboard') }}">Beranda</a> &gt; <span class="active">Riwayat Pengaduan</span>

            </div>

            <div class="card">
            <form method="GET" action="{{ route('pengaduan.mine') }}">
                <div class="search-bar">

                    <!-- SEARCH -->
                            <div class="search-box">
                                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <input type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Telusuri sesuatu...">
                            </div>

                            <div style="position: relative;">
                                <button type="button" class="filter-btn" id="openFilter" title="Filter">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                        <path d="M3 5h18M6 12h12M10 19h4"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"/>
                                    </svg>
                                </button>

                                <!-- FILTER POPUP -->
                                <div class="filter-popup" id="filterPopup">
                                    <div class="filter-header">
                                        <h3>Filter</h3>
                                    </div>

                                    <div class="filter-section">
                                        <div class="filter-title">Kategori</div>

                                        <div class="filter-options">
                                            @foreach($categories as $cat)
                                                <label class="filter-item">
                                                    <input type="checkbox"
                                                        name="category[]"
                                                        value="{{ $cat->id }}"
                                                        {{ in_array($cat->id, (array) request('category')) ? 'checked' : '' }}>
                                                    <span>{{ $cat->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                            <div class="filter-footer">
                                <a href="{{ route('pengaduan.mine') }}" class="btn-reset">
                                    Reset
                                </a>
                                <button type="submit" class="btn-apply">
                                    Terapkan
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>

                <table id="userTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aspirations as $index => $item)
                        <tr>
                            <td>
                                {{ $aspirations->firstItem() + $index }}
                            </td>

                            <td>{{ $item->name }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}
                            </td>

                            <td>{{ $item->category->name ?? '-' }}</td>

                            <td>{{ $item->location }}</td>

                            <td>
                                @if($item->status == 'menunggu')
                                    <span class="status menunggu">Menunggu</span>
                                @elseif($item->status == 'diproses')
                                    <span class="status proses">Diproses</span>
                                @elseif($item->status == 'selesai')
                                    <span class="status selesai">Selesai</span>
                                @else
                                    <span class="status menunggu">Ditolak</span>
                                @endif
                            </td>

                            <td style="text-align:center;">
                                <a href="{{ route('pengaduan.show', $item->id) }}"
                                class="aksi-eye"
                                title="Lihat Detail">

                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                        <path d="M1.5 12s4-7 10.5-7 10.5 7 10.5 7-4 7-10.5 7S1.5 12 1.5 12z"
                                            stroke="#0059FF" stroke-width="2.8"/>
                                        <circle cx="12" cy="12" r="3"
                                                stroke="#0059FF" stroke-width="2.8"/>
                                    </svg>

                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align:center;">
                                Tidak ada data pengaduan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top:20px;">
                    {{ $aspirations->links() }}
                </div>

            </div> <!-- card -->
        </div> <!-- main -->

<script>
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("openFilter");
    const popup = document.getElementById("filterPopup");

    btn.addEventListener("click", function () {
        popup.style.display =
            popup.style.display === "block" ? "none" : "block";
    });

    document.addEventListener("click", function (e) {
        if (!btn.contains(e.target) && !popup.contains(e.target)) {
            popup.style.display = "none";
        }
    });
});
</script>

@endsection
