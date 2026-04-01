@extends('layouts.templateadmin')

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
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
            width: 100%;
            min-height: calc(100vh - 160px);
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
        top: 45px;
        left: 0;
        background: #fff;
        border-radius: 10px;
        padding: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,.15);
        display: none;
        z-index: 9999;
    }

        /* HEADER */
        .filter-header {
            font-size: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid rgba(0,0,0,.1);
            margin-bottom: 10px;
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

        .filter-section label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            cursor: pointer;
        }

        .filter-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 12px;
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
            <h3>Daftar Pengaduan</h3>
            <div class="breadcrumb">
                🏠 <a href="{{ route('admin.dashboard') }}">Beranda</a> &gt; <span class="active">Selesai</span>

            </div>

            <div class="card">
               <div class="search-bar">
                    <div class="search-box">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="searchInput" placeholder="Telusuri sesuatu...">
                    </div>

                    <div style="position: relative;">
                        <button class="filter-btn" id="openFilter" title="Filter">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M3 5h18M6 12h12M10 19h4"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"/>
                            </svg>
                        </button>

                        <!-- FILTER POPUP -->
                        <div class="filter-popup" id="filterPopup">
                            <div class="filter-header"><strong>Filter</strong></div>

                            <div class="filter-section">
                                <div class="filter-title">Kategori</div>
                                <label><input type="checkbox" value="Kelas"> Kelas</label>
                                <label><input type="checkbox" value="UKS"> UKS</label>
                                <label><input type="checkbox" value="Ruang Guru"> Ruang Guru</label>
                                <label><input type="checkbox" value="Toilet"> Toilet</label>
                                <label><input type="checkbox" value="Koperasi"> Koperasi</label>
                            </div>

                            <div class="filter-footer">
                                <button class="btn-reset" id="resetFilter">Reset</button>
                                <button class="btn-apply" id="applyFilter">Terapkan</button>
                            </div>
                        </div>
                    </div>
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
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
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
                                <a href="{{ route('aspiration.show', ['aspiration' => $item->id]) }}"
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
                                <td colspan="7" style="text-align:center;">Tidak ada data</td>
                        </tr> @endforelse
                </tbody>
                </table>

                <div class="pagination">
                    <div id="infoData"></div>
                    <div class="page"></div>
                </div>

            </div> <!-- card -->
        </div> <!-- main -->

    <script>
    document.addEventListener("DOMContentLoaded", function () {

    const rowsPerPage = 10;

    /* ELEMENT */
    const searchInput = document.getElementById("searchInput");
    const filterBtn = document.getElementById("openFilter");
    const filterPopup = document.getElementById("filterPopup");
    const applyBtn = document.getElementById("applyFilter");
    const resetBtn = document.getElementById("resetFilter");
    const pageContainer = document.querySelector(".page");
    const infoData = document.getElementById("infoData");

    let selectedKategori = [];
    let currentPage = 1;

    /* FILTER TOGGLE */
    filterBtn.onclick = (e) => {
        e.stopPropagation();
        filterPopup.style.display = filterPopup.style.display === "block" ? "none" : "block";
    };

    document.addEventListener("click", (e) => {
        if (!filterPopup.contains(e.target) && !filterBtn.contains(e.target)) {
            filterPopup.style.display = "none";
        }
    });

    /* APPLY FILTER */
    applyBtn.onclick = () => {
        selectedKategori = [...filterPopup.querySelectorAll("input:checked")].map(cb => cb.value);
        applySearchAndFilter();
        filterPopup.style.display = "none";
    };

    /* RESET FILTER */
    resetBtn.onclick = () => {
        filterPopup.querySelectorAll("input").forEach(cb => cb.checked = false);
        selectedKategori = [];
        applySearchAndFilter();
    };

    /* SEARCH */
    searchInput.onkeyup = applySearchAndFilter;

    function getRows() {
        return Array.from(document.querySelectorAll("#userTable tbody tr"));
    }

   /* FILTER FUNCTION */
    function applySearchAndFilter() {
        const keyword = searchInput.value.toLowerCase();
        const rows = getRows();

        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const kategori = row.children[3].innerText.trim().toLowerCase();

            const matchSearch = text.includes(keyword);
            const matchKategori =
                selectedKategori.length === 0 ||
                selectedKategori.map(k => k.toLowerCase()).includes(kategori);

            row.classList.toggle("filtered", !(matchSearch && matchKategori));
        });

        currentPage = 1;
        showPage(1);
    }

    /* PAGINATION */
    function getTotalPages() {
        const visible = getRows().filter(r => !r.classList.contains("filtered"));
        return Math.ceil(visible.length / rowsPerPage);
    }

    function showPage(page) {
        currentPage = page;
        const rows = getRows().filter(r => !r.classList.contains("filtered"));

        rows.forEach((row, index) => {
            row.classList.toggle("hidePage",
                !(index >= (page - 1) * rowsPerPage && index < page * rowsPerPage)
            );
        });

        renderPagination();
        updateInfo();
    }

    function renderPagination() {
        pageContainer.innerHTML = "";
        const totalPages = getTotalPages();
        if (totalPages === 0) return;

        // PREV
        const prev = document.createElement("span");
        prev.innerHTML = "&lt;";
        prev.onclick = () => currentPage > 1 && showPage(currentPage - 1);
        pageContainer.appendChild(prev);

        // SLIDING WINDOW
        let start = currentPage - 1;
        if (start < 1) start = 1;

        let end = start + 2;
        if (end > totalPages) {
            end = totalPages;
            start = Math.max(end - 2, 1);
        }

        // BUTTON PAGE
        for (let i = start; i <= end; i++) {
            const btn = document.createElement("span");
            btn.innerText = i;
            if (i === currentPage) btn.classList.add("active");
            btn.onclick = () => showPage(i);
            pageContainer.appendChild(btn);
        }

        // DOTS
        if (end < totalPages) {
            const dots = document.createElement("span");
            dots.innerText = "...";
            dots.classList.add("dots");
            pageContainer.appendChild(dots);
        }

        // NEXT
        const next = document.createElement("span");
        next.innerHTML = "&gt;";
        next.onclick = () => currentPage < totalPages && showPage(currentPage + 1);
        pageContainer.appendChild(next);
    }

    function updateInfo() {
        const rows = getRows().filter(r => !r.classList.contains("filtered"));
        if (rows.length === 0) {
            infoData.innerText = "Tidak ada data";
            return;
        }

        const start = (currentPage - 1) * rowsPerPage + 1;
        const end = Math.min(start + rowsPerPage - 1, rows.length);
        infoData.innerText = `Menampilkan ${start}-${end} dari ${rows.length} data`;
    }

    currentPage = 1;
    showPage(1);

    });

</script>


@endsection
