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

    {{-- SEARCH & SORT FORM --}}
    <form method="GET" action="{{ route('admin.users') }}" class="search-bar">

        <!-- SEARCH -->
        <div class="search-box">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Telusuri nama pengguna...">
        </div>

        <!-- SORT -->
        <div class="sort-wrapper">
            <span>Sort by:</span>

            <select name="sort" onchange="this.form.submit()" class="sort-btn">
                <option value="az" {{ $sort == 'az' ? 'selected' : '' }}>A - Z</option>
                <option value="za" {{ $sort == 'za' ? 'selected' : '' }}>Z - A</option>
            </select>
        </div>

        <button type="submit" style="display:none;"></button>
    </form>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>NIS</th>
                <th>Email</th>
                <th>No. Telpon</th>
                <th class="th-aksi">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $index => $user)
            <tr>
                <td>{{ $users->firstItem() + $index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nis ?? '-' }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone ?? '-' }}</td>
                <td>
                    <form action="{{ route('users.delete', $user->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">🗑</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;">Tidak ada data</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="pagination">
        <div>
            Menampilkan {{ $users->firstItem() ?? 0 }}
            – {{ $users->lastItem() ?? 0 }}
            dari {{ $users->total() }} data
        </div>

        <div>
            {{ $users->links() }}
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

    const popup = document.getElementById("popupDelete");
    let formToSubmit = null;

    document.querySelectorAll(".delete-btn").forEach(btn => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            formToSubmit = this.closest("form");
            popup.style.display = "flex";
        });
    });

    document.getElementById("btnCancel").onclick = () => {
        popup.style.display = "none";
    };

    document.getElementById("btnConfirmDelete").onclick = () => {
        if (formToSubmit) formToSubmit.submit();
    };

});
</script>

@endsection
