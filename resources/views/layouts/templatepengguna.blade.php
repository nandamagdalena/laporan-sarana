<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>LaporKu</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: #f4f6f9;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 20px 16px;
            transition: all 0.3s ease;
        }

        .sidebar.hide {
            margin-left: -250px;
        }

        .sidebar-logo {
            width: 200px;
            display: block;
            margin: 0 auto 24px;
        }

        .menu h4 {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin: 18px 0 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
        }

        .menu a svg {
            width: 18px;
            height: 18px;
            stroke: #6b7280;
            fill: none;
            stroke-width: 2;
        }

        .menu a.active {
            background: #eef4ff;
            color: #2563eb;
            font-weight: 600;
        }

        .menu a.active svg {
            stroke: #2563eb;
        }

        /* ================= CONTENT ================= */
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* ================= TOPBAR ================= */
        .topbar {
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            padding: 0 15px;
            position: relative;
        }

        /* ================= TOMBOL PANAH ================= */
        .toggle-btn {
            width: 34px;
            height: 34px;
            background: #003D80;
            border-radius: 50%;
            border: none;
            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;

            position: absolute;
            left: -17px;        /* 🔥 LEBIH KE KIRI */
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }

        .toggle-btn svg {
            width: 24px;
            height: 24px;

            stroke: #fff;
            stroke-width: 4.8; /* 🔥 GARIS LEBIH PANJANG & TEBAL */
            fill: none;

            stroke-linecap: round;
            stroke-linejoin: round;

            transition: transform 0.3s ease;
        }

        /* PANAH BALIK SAAT SIDEBAR HILANG */
        .wrapper.collapse .toggle-btn svg {
            transform: rotate(180deg);
        }

        /* ================= USER ================= */
        .user {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-text {
            text-align: right;
        }

        .user-text b {
            display: block;
            font-size: 14px;
        }

        .user-text span {
            font-size: 12px;
            color: #6b7280;
        }

        .user img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* ================= PROFILE DROPDOWN ================= */

.user-profile {
    position: relative;
    margin-left: auto;
}

/* Trigger */
.user-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.user-trigger img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
}

.arrow {
    font-size: 12px;
    color: #6b7280;
}

.profile-dropdown {
    position: absolute;
    top: 60px;
    right: 0;
    width: 340px;
    max-width: 90vw;
    background: #fff;
    border-radius: 14px;
    padding: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    display: none;
    z-index: 99;
}

.profile-dropdown.active {
    display: block;
}


/* Foto */
.profile-img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    margin-bottom: 10px;
}

/* Nama */
.profile-card h4 {
    margin: 5px 0;
    font-size: 16px;
}

.profile-card p {
    font-size: 13px;
    color: #6b7280;
    margin-bottom: 15px;
}

/* Button */
.btn-edit {
    display: block;
    background: #eaf2ff;
    color: #2563eb;
    padding: 8px;
    border-radius: 8px;
    text-decoration: none;
    margin-bottom: 10px;
    font-weight: 600;

    text-align: center;   /* 🔥 INI KUNCINYA */
}

.btn-logout {
    display: block;
    background: #ffecec;
    color: #dc2626;
    padding: 8px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;

    text-align: center;   /* 🔥 INI KUNCINYA */
}


/* Trigger Layout */
.user-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

/* Avatar kanan */
.trigger-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

/* Arrow Icon */
.arrow-icon {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: #9ca3af;
    stroke-width: 2.5;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: transform 0.3s ease;
}

/* Rotate saat aktif */
.profile-card.active ~ .arrow-icon,
.user-profile.active .arrow-icon {
    transform: rotate(180deg);
}


/* DROPDOWN HEADER (BIAR KAYAK FOTO) */
.profile-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 12px;
}

.profile-card-header img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
}

.profile-card-header h4 {
    margin: 0;
    font-size: 15px;
}

.profile-card-header p {
    margin: 2px 0 0;
    font-size: 13px;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 5px;
}


    </style>
</head>

<body>

<div class="wrapper" id="wrapper">

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <img src="{{ asset('images/logoatas.png') }}" class="sidebar-logo">

    <div class="menu">
        <h4>Dashboard</h4>
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="2"></rect>
                <rect x="14" y="3" width="7" height="7" rx="2"></rect>
                <rect x="3" y="14" width="7" height="7" rx="2"></rect>
                <rect x="14" y="14" width="7" height="7" rx="2"></rect>
            </svg>
            Dashboard
        </a>

        <h4>Pengaduan</h4>
        <a href="{{ route('user.form_pengaduan') }}" class="{{ request()->routeIs('user.form_pengaduan') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <rect x="4" y="3" width="16" height="18" rx="2"></rect>
                <line x1="8" y1="8" x2="16" y2="8"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            Form Pengaduan
        </a>

        <br>
        <a href="{{ route('user.riwayatpengaduan') }}" class="{{ request()->routeIs('user.riwayatpengaduan') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M12 7v5l3 3"></path>
            </svg>
            Riwayat Pengaduan
        </a>

    </div>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar">
        <button class="toggle-btn" id="toggleBtn">
            <svg viewBox="0 0 24 24">
                <line x1="3" y1="12" x2="20" y2="12"></line>
                <polyline points="10 6 3 12 10 18"></polyline>
            </svg>
        </button>

        <div class="user-profile" id="userProfile">

    <!-- Trigger -->
    <div class="user-trigger" id="userTrigger">

    <div class="user-text">
        <b>Ronaldo Nazario De Lima</b>
        <span>ronaldofenomeno@gmail.com</span>
    </div>

    <img src="{{ asset('images/siswa.jpeg') }}" class="trigger-avatar">

    <svg class="arrow-icon" viewBox="0 0 24 24">
        <path d="M6 9l6 6 6-6"/>
    </svg>

</div>


    <div class="profile-dropdown" id="profileCard">


    <!-- HEADER -->
    <div class="profile-card-header">

        <img src="{{ asset('images/siswa.jpeg') }}">

        <div>
            <h4>Ronaldo Nazario De Lima</h4>

            <p>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="#6b7280">
                    <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6z"/>
                    <path d="M22 6l-10 7L2 6" fill="#6b7280"/>
                </svg>

                ronaldofenomeno@gmail.com
            </p>
        </div>

    </div>

    <!-- BUTTON -->
    <a href="{{ route('user.profil') }}" class="btn-edit">Edit Profil</a>

    <a href="{{ route('login') }}" class="btn-logout">Logout ➜</a>

</div>


</div>

    </div>

    <!-- 🔥 ISI HALAMAN (DARI dashboard.blade) -->
    @yield('content')

</div>
</div>


<script>

const userProfile = document.getElementById('userProfile');
const profileCard = document.getElementById('profileCard');

userProfile.addEventListener('click', function(e){
    e.stopPropagation();

    profileCard.classList.toggle('active');
    userProfile.classList.toggle('active');
});


/* Klik luar */
document.addEventListener('click', function(){
    profileCard.classList.remove('active');
    userProfile.classList.remove('active');
});
</script>



</body>
</html>