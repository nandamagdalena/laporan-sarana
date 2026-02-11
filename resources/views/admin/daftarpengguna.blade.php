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

/* SEARCH BAR FLEX */
.search-bar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    margin-bottom:16px;
}

/* SEARCH */
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
}

.search-icon{
    position:absolute;
    left:10px;
    top:50%;
    transform:translateY(-50%);
    color:#9ca3af;
}

/* SORT */
.sort-wrapper{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
}

.sort-box{
    position:relative;
}

.sort-btn{
    border:1px solid #d1d5db;
    background:#fff;
    padding:6px 12px;
    border-radius:8px;
    cursor:pointer;
}

/* DROPDOWN */
.sort-dropdown{
    position:absolute;
    top:110%;
    right:0;
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:8px;
    box-shadow:0 6px 20px rgba(0,0,0,.15);
    display:none;
    z-index:999;
}

.sort-dropdown div{
    padding:8px 12px;
    cursor:pointer;
}

.sort-dropdown div:hover{
    background:#f3f4f6;
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

/* ICON DELETE */
.delete-btn {
    background: white;
    border: 2px solid #ef4444;
    color: #ef4444;
    padding: 4px 8px;
    border-radius: 8px;
    cursor: pointer;
}

.delete-btn:hover {
    background: #ef4444;
    color: white;
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
    border: none;
    cursor: default;
}

.th-aksi {
    width: 70px;
    text-align: left;
    padding-left: 12px;
}

/* POPUP DELETE */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.popup-box {
    background: white;
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    width: 420px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}

.popup-box img {
    width: 150px;
    margin-bottom: -1px;
}

.popup-box h4 {
    font-size: 22px;
    margin-bottom: 5px;
}

.popup-box p {
    font-size: 14px;
    color: #666;
}

.popup-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 25px;
}

.popup-buttons button {
    padding: 10px 30px;
    border-radius: 10px;
    font-size: 15px;
    cursor: pointer;
}

.btn-cancel {
    border: 2px solid #ef4444;
    background: white;
    color: #ef4444;
}

.btn-delete {
    background: #ef4444;
    border: none;
    color: white;
}
</style>

<div class="main">

<h3>Daftar Pengguna</h3>
<div class="breadcrumb">
    🏠 <a href="{{ route('admin.dashboard') }}">Beranda</a> &gt; <span class="active">Daftar Pengguna</span>
</div>

<div class="card">
    
    <div class="search-bar">

        <!-- SEARCH -->
        <div class="search-box">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" id="searchInput" placeholder="Telusuri nama pengguna...">
        </div>

        <!-- SORT -->
        <div class="sort-wrapper">
            <span>Sort by:</span>

            <div class="sort-box">
                <button class="sort-btn" id="sortBtn">
                    <span id="sortText">A - Z</span> ▼
                </button>

                <div class="sort-dropdown" id="sortDropdown">
                    <div onclick="sortTable('az')">A - Z</div>
                    <div onclick="sortTable('za')">Z - A</div>
                </div>
            </div>
        </div>

    </div>

    <table id="userTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>NIS</th>
                <th>Email</th>
                <th>No. Telpon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <!-- DATA -->
        <tr><td>1</td><td>Aldrich Aditya Pramudya Putra</td><td>1023/144.098</td><td>jhondoe1889@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>2</td><td>Berliana Cahya Rizky Wardani</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>3</td><td>Cendikiawan Rama Fahrezi Nugroho</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>4</td><td>Dianita Salsabila Rahmawati Putri</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>5</td><td>Erlangga Muhammad Rizqullah Saputra</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>6</td><td>Aldrich Aditya Pramudya Putra</td><td>1023/144.098</td><td>jhondoe1889@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>7</td><td>Berliana Cahya Rizky Wardani</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>8</td><td>Cendikiawan Rama Fahrezi Nugroho</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>9</td><td>Dianita Salsabila Rahmawati Putri</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>10</td><td>Erlangga Muhammad Rizqullah Saputra</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>11</td><td>Prastika Devi Anggraini</td><td>1023/144.098</td><td>jhondoe1889@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>12</td><td>Berliana Cahya Rizky Wardani</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>13</td><td>Cendikiawan Rama Fahrezi Nugroho</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>14</td><td>Aldrich Aditya Pramudya Putra</td><td>1023/144.098</td><td>jhondoe1889@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>15</td><td>Berliana Cahya Rizky Wardani</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>16</td><td>Cendikiawan Rama Fahrezi Nugroho</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>17</td><td>Dianita Salsabila Rahmawati Putri</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>18</td><td>Erlangga Muhammad Rizqullah Saputra</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>19</td><td>Aldrich Aditya Pramudya Putra</td><td>1023/144.098</td><td>jhondoe1889@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>20</td><td>Revi Amelia</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>21</td><td>Prastika Devi Anggraini</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>22</td><td>Argyatalla Rama Widodo</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>23</td><td>Erlangga Muhammad Rizqullah Saputra</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>24</td><td>Prastika Devi Anggraini</td><td>1023/144.098</td><td>jhondoe1889@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
        <tr><td>25</td><td>Berliana Cahya Rizky Wardani</td><td>1023/444.098</td><td>jhondoe188@gmail.com</td><td>0812345678910</td><td><button class="delete-btn">🗑</button></td></tr>
    </tbody>
    </tbody>

    </table>

    <div class="pagination">
        <div>Menampilkan 1–10 dari 21 data</div>
        <div class="page"></div>
    </div>

</div>
</div>

<!-- POPUP -->
<div class="popup-overlay" id="popupDelete">
    <div class="popup-box">
          <img src="{{ asset('images/hapus.png') }}">

        <h4>Hapus Pengguna?</h4>
        <p>Data yang Anda pilih akan dihapus<br>
             secara <b style="color:red">permanen</b> dan tidak dapat dikembalikan.</p>

        <div class="popup-buttons">
            <button class="btn-cancel" id="btnCancel">Batalkan</button>
            <button class="btn-delete" id="btnConfirmDelete">Hapus</button>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ================= ELEMENT ================= */
    const tbody = document.querySelector("#userTable tbody");
    const searchInput = document.getElementById("searchInput");
    const sortBtn = document.getElementById("sortBtn");
    const sortDropdown = document.getElementById("sortDropdown");
    const sortText = document.getElementById("sortText");

    /* FUNCTION GET ROWS TERBARU */
    function getRows() {
        return Array.from(tbody.querySelectorAll("tr"));
    }

    /* ================= PAGINATION ================= */
    const rowsPerPage = 10; // ubah ke 2 untuk test
    let currentPage = 1;

    function getTotalPages() {
        return Math.ceil(getRows().length / rowsPerPage);
    }

    const pageContainer = document.querySelector(".page");

    function renderPagination() {
        pageContainer.innerHTML = "";

        const totalPages = getTotalPages();

        // PREV
        const prev = document.createElement("span");
        prev.innerText = "‹";
        prev.onclick = () => currentPage > 1 && showPage(currentPage - 1);
        pageContainer.appendChild(prev);

        // SLIDING RANGE
        let start = currentPage - 1;
        if (start < 1) start = 1;

        let end = start + 2;
        if (end > totalPages) {
            end = totalPages;
            start = Math.max(end - 2, 1);
        }

        // PAGE BUTTONS
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
        next.innerText = "›";
        next.onclick = () => currentPage < totalPages && showPage(currentPage + 1);
        pageContainer.appendChild(next);
    }

    function showPage(page) {
        currentPage = page;
        let rows = getRows();

        rows.forEach((row, index) => {
            row.style.display =
                index >= (page - 1) * rowsPerPage &&
                index < page * rowsPerPage
                    ? ""
                    : "none";
        });

        renderPagination();
    }

    window.showPage = showPage;
    showPage(1);

    /* ================= DELETE POPUP ================= */
    let rowToDelete = null;
    const popup = document.getElementById("popupDelete");

    document.querySelectorAll(".delete-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            rowToDelete = this.closest("tr");
            popup.style.display = "flex";
        });
    });

    document.getElementById("btnCancel").onclick = () => popup.style.display = "none";

    document.getElementById("btnConfirmDelete").onclick = () => {
        if (rowToDelete) rowToDelete.remove();
        popup.style.display = "none";
        showPage(1);
    };

    /* ================= SEARCH ================= */
    searchInput.addEventListener("keyup", function () {
        let keyword = this.value.toLowerCase();
        getRows().forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(keyword) ? "" : "none";
        });
    });



    /* ================= SORT DROPDOWN ================= */
    sortBtn.onclick = (e) => {
        e.stopPropagation();
        sortDropdown.style.display =
            sortDropdown.style.display === "block" ? "none" : "block";
    };

    document.addEventListener("click", (e) => {
        if (!sortBtn.contains(e.target) && !sortDropdown.contains(e.target)) {
            sortDropdown.style.display = "none";
        }
    });

    /* ================= SORT TABLE ================= */
   window.sortTable = function (type) {
    let rows = getRows();

    rows.sort((a, b) => {
        let A = a.cells[1].innerText.trim().toLowerCase();
        let B = b.cells[1].innerText.trim().toLowerCase();

        if (type === "az") return A.localeCompare(B, 'id');
        else return B.localeCompare(A, 'id');
    });

    // kosongkan tbody lalu append ulang
    tbody.innerHTML = "";
    rows.forEach(row => tbody.appendChild(row));

    sortText.innerText = type === "az" ? "A - Z" : "Z - A";
    sortDropdown.style.display = "none";

    showPage(1);
};


});
</script>


@endsection