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

.btn-edit {
    margin: 20px;
    padding: 12px 20px;
    background: #dbeafe;
    color: #1e40af;
    text-decoration: none;
    border-radius: 12px;
    display: inline-block;
    font-weight: 600;
}

.btn-logout {
    margin: 20px;
    padding: 12px 20px;
    background: #fee2e2;
    color: #dc2626;
    text-decoration: none;
    border-radius: 12px;
    display: inline-block;
    font-weight: 600;
    cursor: pointer;
}

.logout-btn-top{
    background:#fee2e2;
    border:none;
    padding:8px 14px;
    border-radius:8px;
    color:#dc2626;
    font-weight:600;
    cursor:pointer;
}

.user {
    margin-left:auto;
    display:flex;
    align-items:center;
    gap:18px;
}

.user-info b{
    font-size:18px;
}

.user-info small{
    font-size:14px;
    color:#6b7280;
}

.logout-form{
    margin:0;
}

.logout-link{
    background:transparent;
    border:none;
    color:#dc2626;
    font-weight:600;
    cursor:pointer;
    font-size:14px;
    padding:6px 10px;
    border-radius:8px;
    transition:0.2s;
}

.logout-link:hover{
    background:#fee2e2;
}

/* ================= PROFILE DROPDOWN ================= */

.profile-overlay{
    position:fixed;
    inset:0;
    display:none;
    z-index:98; /* lebih kecil dari dropdown */
}

.profile-dropdown{
    position:fixed;
    top:70px;
    right:30px;
    width:340px;
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 15px 40px rgba(0,0,0,0.15);
    display:none;
    z-index:9999; /* lebih tinggi dari overlay */
    opacity:0;
    transform:translateY(-10px);
    transition:0.25s ease;
}

.profile-header{
    display:flex;
    align-items:center;
    gap:15px;
}

.profile-icon{
    width:55px;
    height:55px;
    border-radius:50%;
    background:#f3f4f6;
    display:flex;
    align-items:center;
    justify-content:center;
}

.profile-icon svg{
    width:28px;
    height:28px;
    color:#6b7280;
}

.profile-header b{
    font-size:18px;
}

.profile-header small{
    color:#6b7280;
}

.profile-dropdown hr{
    margin:20px 0;
    border:none;
    border-top:1px solid #e5e7eb;
}

.dropdown-btn{
    width:100%;
    display:block;
    padding:14px;
    border-radius:14px;
    font-weight:600;
    text-align:center;
    margin-bottom:15px;
    text-decoration:none;
    border:none;
    cursor:pointer;
}

.edit-btn{
    background:#dbeafe;
    color:#1e40af;
}

.logout-btn{
    background:#fee2e2;
    color:#dc2626;
}

.dropdown-btn:hover{
    opacity:0.9;
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
        <a href="{{ route('admin.users') }}"
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

        <a href="{{ route('aspiration.index') }}"
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
        <a href="{{ route('category.index') }}"
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

        <div class="user" id="userToggle">
            <div class="user-info">
                <b>{{ Auth::user()->name }}</b><br>
                <small>{{ Auth::user()->email }}</small>
            </div>
            <img src="{{ Auth::user()->photo
            ? asset('storage/profile/' . Auth::user()->photo)
            : asset('images/user.jpeg') }}">
        </div>
    </div>

    <!-- OVERLAY -->
    <div class="profile-overlay" id="profileOverlay"></div>

    <!-- DROPDOWN -->
    <div class="profile-dropdown" id="profileDropdown">
        <div class="profile-header">
            <div class="profile-icon">
                <img src="{{ Auth::user()->photo
                        ? asset('storage/profile/' . Auth::user()->photo)
                        : asset('images/user.jpeg') }}"
                    style="width:55px;height:55px;border-radius:50%;object-fit:cover;">
            </div>

            <div>
                <b>{{ Auth::user()->name }}</b><br>
                <small>{{ Auth::user()->email }}</small>
            </div>
        </div>

        <hr>

        <a href="{{ route('admin.profile') }}" class="dropdown-btn edit-btn">Edit Profil</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-btn logout-btn">
                Logout ➜
            </button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div style="padding:20px;">
        @yield('content')
    </div>

</div> <!-- tutup content -->
</div> <!-- tutup wrapper -->

<script>

const userToggle = document.getElementById('userToggle');
const profileDropdown = document.getElementById('profileDropdown');
const profileOverlay = document.getElementById('profileOverlay');

userToggle.addEventListener("click", function () {

    if(profileDropdown.style.display === "block"){
        closeProfile();
    } else {
        profileDropdown.style.display = "block";
        profileOverlay.style.display = "block";

        setTimeout(() => {
            profileDropdown.style.opacity = "1";
            profileDropdown.style.transform = "translateY(0)";
        }, 10);
    }
});

function closeProfile(){
    profileDropdown.style.opacity = "0";
    profileDropdown.style.transform = "translateY(-10px)";
    profileOverlay.style.display = "none";

    setTimeout(() => {
        profileDropdown.style.display = "none";
    }, 200);
}

profileOverlay.addEventListener("click", closeProfile);

</script>

</body>
</html>
