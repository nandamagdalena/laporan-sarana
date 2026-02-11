@extends('layouts.templateadmin')

@section('title', 'Dashboard')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.dashboard-wrapper {
    padding: 24px;
    background: #f4f6f9;
    min-height: 100vh;
}

.dashboard-title h1 {
    margin: 0;
    font-size: 26px;
    font-weight: 700;
}

.dashboard-title p {
    margin-top: 6px;
    color: #6b7280;
    font-size: 14px;
}

/* KHUSUS CARD LIST PENGGUNA */
.dashboard-grid .card:nth-child(3) {
    max-width: 605px;
    width: 100%;
    justify-self: start;
    min-height: 360px;   /* 🔥 bikin terasa “sebesar chart” */
}

/* ================= STAT CARD ================= */
.stat-card {
    margin-top: 24px;
    background: #fff;
    border-radius: 24px;
    padding: 36px 28px;
    display: flex;
    box-shadow: 0 10px 28px rgba(0,0,0,0.06);
}

.stat-item {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 0 14px;
}

.stat-item:not(:last-child) {
    border-right: 1px solid #f1f1f1;
}

.stat-icon {
    width: 84px;
    height: 84px;
    border-radius: 50%;
    background: #dcfce7;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-icon svg {
    width: 38px;
    height: 38px;
    stroke: #22c55e;
}

.stat-info span {
    font-size: 14px;
    color: #9ca3af;
}

.stat-info h2 {
    margin: 6px 0 0;
    font-size: 34px;
    font-weight: 700;
}

/* ================= GRID ================= */
.dashboard-grid {
    margin-top: 32px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.card {
    background: #fff;
    border-radius: 22px;
    padding: 22px;
    box-shadow: 0 8px 22px rgba(247, 246, 246, 0.05);
}

.card h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 700;
}

.card p {
    margin-top: 6px;
    font-size: 13px;
    color: #9ca3af;
}

/* ================= CHART ================= */
.chart-container {
    margin-top: 16px;
    height: 300px;
}

/* ================= USER LIST ================= */
.user-list {
    margin-top: 12px;
}

.user-item {
    padding: 18px 16px;   /* ⬅️ isi card lebih penuh */
    gap: 18px;
}

/* KHUSUS LIST PENGGUNA BARU */
.dashboard-grid .card:nth-child(3) .user-item img {
    width: 48px;
    height: 48px;
    border-radius: 50%;   /* 🔥 INI KUNCINYA BIAR BULAT */
    object-fit: cover;
}

/* ==============================
   CARD LIST PENGGUNA TERBARU
============================== */

/* Judul card */
.card h3 {
    color: #05004E;
    font-size: 22px;      /* 🔥 dibesarkan */
    font-weight: 700;
    margin-bottom: 18px;
}

/* Item user */
.user-item {
    display: flex;
    align-items: center;
    gap: 22px;            /* ⬅️ jarak foto & teks */
    padding: 20px 18px 20px 28px; /* 🔥 geser ke kanan */
}

/* Foto profil BULAT */
.user-item img {
    width: 72px;        /* 🔥 jauh lebih besar */
    height: 72px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}

/* Nama user */
.user-item b {
    font-size: 18px;      /* 🔥 nama makin dominan */
    font-weight: 700;
    color: #05004E;
}

.user-item small {
    font-size: 15px;
    color: #003D80;
}

.dashboard-grid .card:nth-child(3) .user-item b {
    font-size: 15px;
    font-weight: 600;
}

.dashboard-grid .card:nth-child(3) .user-item small {
    font-size: 13px;
    color: #6b7280;
}

.dashboard-grid .card:nth-child(3) .user-item {
    padding: 14px 10px;
    gap: 16px;
}

/* ================= LEGEND ================= */
.legend {
    display: flex;
    justify-content: center;
    width: 100%;
    margin-top: 16px;
}

.legend span:nth-child(2) {
    margin-left: 24px;   /* 🔥 jarak antar Total Pengguna & Pengguna Baru */
    margin-top: px;   /* 🔽 turunin sedikit */
}

.legend span {
    display: flex;
    align-items: center;
    gap: 6px;
}
.dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
}
.blue { background: #2563eb; }
.green { background: #22c55e; }

/* ===============================
   CHART PENAMBAHAN PENGGUNA
  /* ===============================
   PANJANGKAN CHART KE KIRI
================================ */
.chart-left {
    margin-left: -90px;                /* ⬅️ tarik ke kiri */
    width: calc(100% + 90px);          /* ➕ tambah lebar */
}

.chart-left canvas {
    width: 100% !important;
}

/* ===============================
   PANJANGKAN CARD PUTIH KE KIRI
   (Chart Penambahan Pengguna)
================================ */
.dashboard-grid .card:last-child {
    margin-left: -147px;              /* ⬅️ tarik card ke kiri */
    width: calc(100% + 145px);        /* ➕ lebarkan card */
}

</style>

<div class="dashboard-wrapper">

    <div class="dashboard-title">
        <h1>Dashboard</h1>
        <p>Halo, Admin Sarpras, selamat datang kembali di Dashboard Laporku!</p>
    </div>

    <!-- ================= STAT ================= -->
    <div class="stat-card">
        <div class="stat-item">
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2M15 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Total Pengguna</span>
                <h2>5,423</h2>
            </div>
        </div>

        <div class="stat-item">
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Kategori</span>
                <h2>10</h2>
            </div>
        </div>

        <div class="stat-item">
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v14l-4-3H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Pengaduan</span>
                <h2>189</h2>
            </div>
        </div>
    </div>

    <!-- ================= GRID ================= -->
    <div class="dashboard-grid">

        <div class="card">
            <h3>Chart Pengguna</h3>
            <p>Data Keseluruhan Pengguna</p>
            <div class="chart-container">
                <canvas id="chartPengguna"></canvas>
            </div>
        </div>

        <div class="card">
            <h3>Chart Pengaduan</h3>
            <p>Statistik Jumlah Pengaduan</p>
            <div class="chart-container">
                <canvas id="chartPengaduan"></canvas>
            </div>
        </div>

        <div class="card">
            <h3>List Pengguna Terbaru</h3>
            <div class="user-list">
                @for($i=0;$i<4;$i++)
                <div class="user-item">
                    <img src="https://i.pravatar.cc/100?img=3">
                    <div>
                        <b>Alberto Vieira Santos</b><br>
                        <small>Bergabung: 27 November 2025</small>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="card">
            <h3>Chart Penambahan Pengguna</h3>

            <div class="chart-container chart-left">
                <canvas id="chartBar"></canvas>
            </div>

            <div class="legend">
                <span><div class="dot blue"></div>Total Pengguna</span>
                <span><div class="dot green"></div>Pengguna Baru</span>
            </div>
        </div>

    </div>
</div>

<script>
/* ================= CHART PENGGUNA ================= */
new Chart(document.getElementById('chartPengguna'), {
    type: 'line',
    data: {
        labels: ['Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep'],
        datasets: [{
            data: [120,190,150,303,210,180,240,200],
            borderColor: '#dc2626',
            borderWidth: 4,
            tension: 0.45,
            fill: true,
            backgroundColor: (ctx) => {
                const g = ctx.chart.ctx.createLinearGradient(0,0,0,300);
                g.addColorStop(0,'rgba(239,68,68,.35)');
                g.addColorStop(1,'rgba(239,68,68,0)');
                return g;
            },
            pointRadius: ctx => ctx.dataIndex === 3 ? 12 : 0,
            pointBackgroundColor: '#dc2626',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#ffffff',
                caretColor: '#ffffff',   // 🔥 PANAH PUTIH
                caretSize: 8,

                titleColor: '#111827',
                bodyColor: '#6b7280',
                borderColor: '#e5e7eb',
                borderWidth: 1,

                padding: 20,
                borderRadius: 12,
                displayColors: false,

                titleFont: { size: 16, weight: 'bold' },
                bodyFont: { size: 14 },

                callbacks: {
                    title: () => 'Jumlah Pengguna',
                    label: ctx => ctx.raw + ' Pengguna'
                }
            }
        },
        scales: {
            x: { grid: { display: false } },
            y: { display: false }
        }
    }
});

/* ================= CHART PENGADUAN ================= */
new Chart(document.getElementById('chartPengaduan'), {
    type: 'line',
    data: {
        labels: ['Feb','Mar','Apr','Mei','Jun','Jul'],
        datasets: [{
            data: [120,300,450,280,450,260],
            borderColor: '#2ea8df',
            borderWidth: 5,
            tension: 0.45,
            fill: true,
            backgroundColor: (ctx) => {
                const g = ctx.chart.ctx.createLinearGradient(0,0,0,320);
                g.addColorStop(0,'rgba(46,168,223,.35)');
                g.addColorStop(1,'rgba(46,168,223,0)');
                return g;
            },
            pointRadius: ctx => ctx.dataIndex === 2 ? 14 : 0,
            pointBackgroundColor: '#2ea8df',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 7
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#ffffff',
                caretColor: '#ffffff',   // 🔥 PANAH PUTIH
                caretSize: 8,

                titleColor: '#111827',
                bodyColor: '#6b7280',
                borderColor: '#e5e7eb',
                borderWidth: 1,

                padding: 22,
                borderRadius: 12,
                displayColors: false,

                titleFont: { size: 15, weight: 'bold' },
                bodyFont: { size: 14 },

                callbacks: {
                    title: () => 'Jumlah Pengaduan',
                    label: () => '600, 2026'
                }
            }
        },
        scales: {
            x: { grid: { display: false } },
            y: { display: false }
        }
    }
});

/* ================= BAR CHART ================= */
new Chart(document.getElementById('chartBar'), {
    type: 'bar',
    data: {
        labels: ['2019','2020','2021','2022','2023','2024','2025'],
        datasets: [
            {
                data: [14,17,6,16,12,17,21],
                backgroundColor: '#2563eb',
                borderRadius: 10,
                barThickness: 18
            },
            {
                data: [12,12,22,6,11,13,11],
                backgroundColor: '#22c55e',
                borderRadius: 10,
                barThickness: 18
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#ffffff',
                caretColor: '#ffffff',   // 🔥 PANAH PUTIH
                caretSize: 8,

                titleColor: '#111827',
                bodyColor: '#6b7280',
                borderColor: '#e5e7eb',
                borderWidth: 1,

                padding: 18,
                borderRadius: 12,
                displayColors: false
            }
        },
        scales: {
            x: { grid: { display: false } },
            y: { beginAtZero: true }
        }
    }
});
</script>


@endsection