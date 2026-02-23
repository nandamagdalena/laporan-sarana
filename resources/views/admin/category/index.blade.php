@extends('layouts.templateadmin')

@section('content')

<style>
*{
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif
}

body{
    background:#f4f6f9;
}

/* ===== MAIN WRAPPER ===== */
.main{
    padding:40px 32px;
    margin-left:0;
}

@media(min-width:1024px){
    .main{
        padding:40px 40px;
    }
}

/* ===== PAGE HEADER ===== */
.header-page{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:22px;
}

.header-page h3{
    margin:0
}

.breadcrumb{
    font-size:13px;
    color:#6b7280;
    margin-top:4px;
}

.breadcrumb a{
    color:#111;
    text-decoration:none
}

.breadcrumb span{
    color:#dc2626;
    font-weight:600
}

/* ===== BUTTON ===== */
.btn{
    padding:10px 16px;
    border-radius:8px;
    border:none;
    cursor:pointer;
    font-size:14px
}
.btn-primary{background:#003D80;color:#fff}
.btn-secondary{background:#9ca3af;color:#fff}
.btn-danger{background:#dc2626;color:#fff}

/* ===== CARD ===== */
.card{
    background:#fff;
    border-radius:14px;
    padding:26px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
    margin-top:6px;
}

/* ===== SEARCH ===== */
.search-bar{
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

/* ===== TABLE ===== */
table{
    width:100%;
    border-collapse:separate;
    border-spacing:0;
    overflow:hidden;
    border-radius:12px
}

thead{
    background:#0059A8;
    color:#fff
}

th,td{
    padding:12px;
    font-size:14px;
    border-bottom:1px solid #e5e7eb;
    text-align:center
}

th:nth-child(2),td:nth-child(2){
    text-align:left
}

tbody tr:hover{
    background:#f9fafb
}

/* ===== AKSI ICON BOX ===== */
.aksi{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
}

.icon-btn{
    width:36px;
    height:36px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#fff;
    cursor:pointer;
    transition:0.2s ease;
}

.icon-edit{
    border:2px solid #f59e0b;
    color:#f59e0b;
}

.icon-edit:hover{
    background:#f59e0b;
    color:#fff;
    transform:scale(1.05);
}

.icon-delete{
    border:2px solid #ef4444;
    color:#ef4444;
}

.icon-delete:hover{
    background:#ef4444;
    color:#fff;
    transform:scale(1.05);
}

.icon-btn svg{
    width:18px;
    height:18px;
}

/* PAGINATION */
.pagination{
    display:flex;
    justify-content:space-between;
    margin-top:15px;
    font-size:13px;
}
.page{
    display:flex;
    gap:6px;
}
.page span{
    width:28px;
    height:28px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    border:1px solid #d1d5db;
    cursor:pointer;
}
.page .active{
    background:#f97316;
    color:#fff;
}
.page .dots{
    border:none;
    cursor:default;
}

/* ===== MODAL FORM ===== */
.modal{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.45);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:999
}

.modal-box{
    background:#fff;
    width:420px;
    border-radius:18px;
    padding:28px 30px
}

.modal-box h4{
    margin:0;
    font-size:20px
}

.modal-box small{
    color:#6b7280
}

.divider{
    height:1px;
    background:#e5e7eb;
    margin:20px 0
}

.form-group label{
    font-weight:600;
    font-size:14px
}

.form-control{
    width:100%;
    margin-top:8px;
    padding:12px 14px;
    border-radius:8px;
    border:1px solid #d1d5db
}

.modal-footer{
    display:flex;
    justify-content:flex-end;
    gap:12px;
    margin-top:28px
}

/* ================= POPUP DELETE SESUAI GAMBAR ================= */
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
    background:white;
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
    background:white;
    color:#ef4444;
    font-weight:600;
    cursor:pointer;
    transition:0.2s;
}

.btn-cancel:hover{
    background:#fee2e2;
}

.btn-delete{
    padding:10px 32px;
    border-radius:12px;
    border:none;
    background:#dc2626;
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:0.2s;
}

.btn-delete:hover{
    background:#b91c1c;
}

</style>

<div class="main">

<div class="header-page">
    <div>
        <h3>Kategori</h3>
        <div class="breadcrumb">
            🏠 <a href="{{ route('admin.dashboard') }}">Beranda</a> > <span>Kategori</span>
        </div>
    </div>
    <button class="btn btn-primary" onclick="openTambah()">+ Tambah Kategori</button>
</div>

{{-- ALERT SUCCESS DI SINI --}}
@if(session('success'))
<div style="margin-bottom:15px;padding:12px;background:#d1fae5;color:#065f46;border-radius:8px;">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div style="margin-bottom:15px;padding:12px;background:#fee2e2;color:#991b1b;border-radius:8px;">
    <ul style="margin:0;padding-left:18px;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">

   <div class="search-bar">
        <div class="search-box">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" id="searchInput" placeholder="Telusuri sesuatu...">
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Dibuat Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $index => $category)
            <tr>
                <td>{{ $categories->firstItem() + $index }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('d-m-Y') }}</td>
                <td>
                    <div class="aksi">

                        <!-- EDIT -->
                        <div class="icon-btn icon-edit"
                            onclick="openEdit({{ $category->id }}, '{{ $category->name }}')">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25z"/>
                                <path d="M20.71 7.04a1 1 0 000-1.41l-2.34-2.34a1 1 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                            </svg>
                        </div>

                        <!-- DELETE -->
                        <div class="icon-btn icon-delete"
                            onclick="openDelete({{ $category->id }})">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z"/>
                                <path d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                            </svg>
                        </div>

                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tidak ada data kategori</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="pagination">
        <div>
            Menampilkan {{ $categories->firstItem() ?? 0 }}
            - {{ $categories->lastItem() ?? 0 }}
            dari {{ $categories->total() }} data
        </div>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
</div>
</div>

<!-- MODAL FORM -->
<div class="modal" id="modalForm">
    <div class="modal-box">
        <form id="categoryForm" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod">

            <h4 id="modalTitle"></h4>
            <small id="modalDesc"></small>

            <div class="divider"></div>

            <div class="form-group">
                <label>Nama Kategori <span style="color:red">*</span></label>
                <input type="text" name="name" id="namaKategori" class="form-control" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- POPUP DELETE -->
<div class="modal-delete" id="deleteModal">

    <div class="delete-box">

        <!-- ICON FOLDER + TRASH -->
        <div class="delete-icon-svg">
            <svg width="90" height="70" viewBox="0 0 64 48">
                <!-- Folder -->
                <path d="M4 10c0-2.2 1.8-4 4-4h14l4 4h26c2.2 0 4 1.8 4 4v20c0 2.2-1.8 4-4 4H8c-2.2 0-4-1.8-4-4V10z"
                    fill="#ef4444"/>

                <!-- Trash -->
                <rect x="36" y="16" width="20" height="20" rx="3" fill="#fecaca"/>
                <rect x="42" y="22" width="2" height="10" fill="#ef4444"/>
                <rect x="46" y="22" width="2" height="10" fill="#ef4444"/>
                <rect x="34" y="14" width="24" height="3" fill="#ef4444"/>
            </svg>
        </div>

        <h2>Hapus Data?</h2>
        <p>
            Data yang Anda pilih akan dihapus secara
            <b class="text-danger">permanen</b> dan tidak dapat dikembalikan.
        </p>

        <div class="delete-btn-area">
            <button class="btn-cancel" onclick="closeDelete()">Batalkan</button>
            <button class="btn-delete" onclick="hapusKategori()">Hapus</button>

        </div>

    </div>

    <!-- FORM DELETE (WAJIB ADA) -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</div>


<script>
const modalForm = document.getElementById("modalForm");
const modalDelete = document.getElementById("deleteModal");
const categoryForm = document.getElementById("categoryForm");
const deleteForm = document.getElementById("deleteForm");
const namaKategori = document.getElementById("namaKategori");
const formMethod = document.getElementById("formMethod");

let selectedId = null;

// OPEN TAMBAH
function openTambah(){
    modalForm.style.display="flex";
    categoryForm.action = "{{ route('category.store') }}";
    formMethod.value = "POST";
    namaKategori.value = "";
    document.getElementById("modalTitle").innerText="Tambah Kategori";
    document.getElementById("modalDesc").innerText="Tambahkan kategori baru.";
}

// OPEN EDIT
function openEdit(id, name){
    modalForm.style.display="flex";
    categoryForm.action = "/admin/categories/" + id;
    formMethod.value = "PUT";
    namaKategori.value = name;
    document.getElementById("modalTitle").innerText="Edit Kategori";
    document.getElementById("modalDesc").innerText="Perbarui kategori.";
}

// OPEN DELETE
function openDelete(id){
    selectedId = id;
    modalDelete.style.display="flex";
}

// DELETE
function hapusKategori(){
    deleteForm.action = "/admin/categories/" + selectedId;
    deleteForm.submit();
}

// CLOSE
function closeModal(){
    modalForm.style.display="none";
}
function closeDelete(){
    modalDelete.style.display="none";
}
</script>
@endsection
