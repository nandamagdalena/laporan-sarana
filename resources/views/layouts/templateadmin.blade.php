<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>LaporKu</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

html,body{
    margin:0;
    height:100%;
}

body{
    background:#f4f6f9;
}

.wrapper{
    display:flex;
    min-height:100vh;
}

/* ================= SIDEBAR ================= */
.sidebar{
    width:260px;
    background:#fff;
    padding:24px 16px;
    border-right:1px solid #e5e7eb;
    transition:.3s;
}

.sidebar.hide{
    margin-left:-260px;
}

.sidebar-logo{
    width:190px;
    display:block;
    margin:0 auto 30px;
}

/* ================= MENU ================= */
.menu h4{
    font-size:13px;
    font-weight:700;
    color:#111827;
    margin:18px 0 8px 10px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:10px 14px;
    margin-bottom:6px;
    border-radius:10px;
    color:#6b7280;
    text-decoration:none;
    font-size:14px;
    transition:.2s;
    width:100%;
}

/* MENU PENGGUNA KHUSUS */
.menu-user{
    display:flex;
    align-items:center;
    gap:14px;
    padding:16px 20px;
    border-radius:20px;
    color:#6b7280;
    font-size:20px; /* tulisan besar seperti gambar */
    font-weight:500;
    transition:0.2s;
    width:100%;
}

/* ICON BESAR & TIDAK GEPENG */
.menu-user svg{
    width:36px;
    height:36px;
    color:#9ca3af;
}

/* ACTIVE STATE */
.menu-user.active{
    background:#f1f6ff; /* biru muda full layar */
    color:#0b4da2;       /* tulisan biru */
    font-weight:600;
}

/* ICON JADI BIRU */
.menu-user.active svg{
    color:#0b4da2;
}


/* ICON STYLE */
.menu a svg{
    width:22px;
    height:22px;
    fill:#9ca3af;
}

.menu a:hover{
    background:#f1f5f9;
}

/* ACTIVE MENU */
.menu a.active{
    background:#eef4ff;
    color:#0b4da2;
    font-weight:600;
}

.menu a.active svg{
    fill:#0b4da2;
}

/* ================= CONTENT ================= */
.content{
    flex:1;
    display:flex;
    flex-direction:column;
}

/* ================= TOPBAR ================= */
.topbar{
    height:60px;
    background:#fff;
    border-bottom:1px solid #e5e7eb;
    display:flex;
    align-items:center;
    padding:0 20px;
    position:relative;
}

/* TOGGLE BUTTON */
.toggle-btn{
    width:42px;
    height:42px;
    background:#0b4da2;
    border-radius:50%;
    border:none;
    cursor:pointer;
    position:absolute;
    left:-21px;
    top:50%;
    transform:translateY(-50%);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 4px 10px rgba(0,0,0,.25);
}

.toggle-btn svg{
    width:20px;
    height:20px;
    fill:#fff;
}

/* USER PROFILE */
.user{
    margin-left:auto;
    display:flex;
    align-items:center;
    gap:12px;
}

.user img{
    width:46px;
    height:46px;
    border-radius:50%;
    object-fit:cover;
}
</style>
</head>

<body>

<div class="wrapper">

<!-- ================= SIDEBAR ================= -->
<div class="sidebar" id="sidebar">
    <img src="{{ asset('images/logoatas.png') }}" class="sidebar-logo">

    <div class="menu">

        <!-- DASHBOARD -->
        <h4>Dashboard</h4>
        <a href="{{ route('admin.dashboard') }}" 
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <!-- ICON DASHBOARD GRID -->
            <svg viewBox="0 0 24 24">
                <path d="M3 3h8v8H3zM13 3h8v8h-8zM3 13h8v8H3zM13 13h8v8h-8z"/>
            </svg>

            Dashboard
        </a>


        <!-- ===== PENGGUNA ===== -->
        <h4>Pengguna</h4>
        <a href="{{ route('admin.daftarpengguna') }}" 
        class="menu-user {{ request()->routeIs('admin.daftarpengguna') ? 'active' : '' }}">

            <!-- ICON USERS BULAT (SEPERTI GAMBAR) -->
            <svg viewBox="0 0 24 24" fill="currentColor">
                <!-- kepala tengah -->
                <circle cx="12" cy="8" r="3.5"/>
                <!-- kepala kiri -->
                <circle cx="6" cy="9" r="2.5"/>
                <!-- kepala kanan -->
                <circle cx="18" cy="9" r="2.5"/>

                <!-- badan tengah -->
                <path d="M4 20c0-3.5 3.5-6 8-6s8 2.5 8 6v1H4z"/>
                <!-- badan kiri -->
                <path d="M1 20c0-2.5 2.5-4.5 5.5-4.5"/>
                <!-- badan kanan -->
                <path d="M23 20c0-2.5-2.5-4.5-5.5-4.5"/>
            </svg>

            Daftar Pengguna
        </a>



        <!-- ===== PENGADUAN ===== -->
        <h4>Pengaduan</h4>

        <a href="{{ route('admin.daftarpengaduan') }}" 
        class="menu-pengaduan {{ request()->routeIs('admin.daftarpengaduan') ? 'active' : '' }}">

            <!-- ICON DOKUMEN SEPERTI GAMBAR -->
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"/>
                <path d="M14 2v6h6"/>
                <rect x="8" y="10" width="6" height="2" rx="1"/>
                <rect x="8" y="14" width="8" height="2" rx="1"/>
                <rect x="8" y="18" width="5" height="2" rx="1"/>
            </svg>

            Daftar Pengaduan
        </a>



        <!-- KATEGORI (FOLDER) -->
        <h4>Kategori</h4>
        <a href="{{ route('admin.kategori') }}" 
           class="{{ request()->routeIs('admin.kategori') ? 'active' : '' }}">

            <!-- ICON FOLDER -->
            <svg viewBox="0 0 24 24">
                <path d="M2 6a2 2 0 0 1 2-2h6l2 2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6z"/>
            </svg>

            Kategori
        </a>

    </div>
</div>



<!-- ================= CONTENT ================= -->
<div class="content">

    <div class="topbar">
        <button class="toggle-btn" id="toggleBtn">
            <svg viewBox="0 0 24 24">
                <path d="M15 6l-6 6 6 6"/>
            </svg>
        </button>

        <div class="user">
            <div>
                <b>Admin Sarpras</b><br>
                <small>adminsarpras@gmail.com</small>
            </div>
            <img src="{{ asset('images/user.jpeg') }}">
        </div>
    </div>

    @yield('content')

</div>
</div>

<script>
const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');

toggleBtn.onclick = () => {
    sidebar.classList.toggle('hide');
    toggleBtn.innerHTML = sidebar.classList.contains('hide')
        ? `<svg viewBox="0 0 24 24"><path d="M9 6l6 6-6 6"/></svg>`
        : `<svg viewBox="0 0 24 24"><path d="M15 6l-6 6 6 6"/></svg>`;
};
</script>

</body>
</html>