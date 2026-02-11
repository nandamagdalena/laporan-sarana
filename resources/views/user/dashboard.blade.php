@extends('layouts.templatepengguna')

@section('title', 'Dashboard')

@section('content')

<style>
/* ================= GLOBAL ================= */
.dashboard-wrapper{
    padding:40px;
    background:#f4f6f9;
    min-height:100vh;
}

/* ================= HERO ================= */
.hero{
    position: relative;
    background:#0059A8;
    border-radius:28px;
    padding:16px 34px;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:space-between;
    min-height:140px;
    overflow:visible;
}

.hero-text{
    max-width:700px;
    z-index:2;
}

.hero-text h1{
    margin:0;
    font-size:40px;
    font-weight:700;
}

.hero-text p{
    margin-top:8px;
    font-size:16px;
    line-height:1.6;
    opacity:.95;
}

.hero-image {
    position: absolute;
    right: 40px;
    top: 50%;
    transform: translateY(-50%);
    
    display: flex;
    justify-content: center;
    align-items: center;

    width: 300px;
    height: 260px;

    z-index: 2;
}

/* Daun (background) */
.hero-image .daun {
    position: absolute;
    width: 260px;
    opacity: 0.35;
    z-index: 1;
}

/* Anak (foreground) */
.hero-image .anak {
    position: relative;

    height: 185px;      /* KECILKAN */
    max-height: 100%;   /* Biar nggak keluar box */

    z-index: 2;
    top: -13px;         /* Tetap agak naik */
    object-fit: contain;
}


/* ================= STAT ================= */
.stat-card{
    margin-top:28px;
    background:#fff;
    border-radius:24px;
    padding:32px 28px;
    display:flex;
    box-shadow:0 10px 28px rgba(0,0,0,.06);
}

.stat-item{
    flex:1;
    display:flex;
    align-items:center;
    gap:16px;
    padding:0 14px;
}

.stat-item:not(:last-child){
    border-right:1px solid #f1f1f1;
}

.stat-icon{
    width:80px;
    height:80px;
    border-radius:50%;
    background:#dcfce7;
    display:flex;
    align-items:center;
    justify-content:center;
}

.stat-icon svg{
    width:36px;
    height:36px;
    stroke:#22c55e;
}

.stat-info span{
    font-size:14px;
    color:#9ca3af;
}

.stat-info h2{
    margin:6px 0 0;
    font-size:32px;
    font-weight:700;
}

/* ================= GRID ================= */
.dashboard-grid{
    margin-top:32px;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:24px;
}

.card{
    background:#fff;
    border-radius:22px;
    padding:22px;
    box-shadow:0 8px 22px rgba(0,0,0,.05);
}

.card h3{
    margin:0;
    font-size:18px;
    font-weight:700;
}

.card p{
    margin-top:6px;
    font-size:13px;
    color:#9ca3af;
}

/* ================= CHART ================= */
.chart-container{
    margin-top:16px;
    height:300px;
}
</style>

<div class="dashboard-wrapper">

    <!-- HERO -->
    <div class="hero">
        <div class="hero-text">
            <h1>Halo, Ronaldo! 👋</h1>
            <p>
                Laporku! membantu Anda melaporkan sarana sekolah yang bermasalah
                agar segera ditindaklanjuti demi lingkungan belajar yang aman dan nyaman.
            </p>
        </div>

        <div class="hero-image">
            <img src="{{ asset('images/daun.png') }}" class="daun">
            <img src="{{ asset('images/anak.png') }}" class="anak">
        </div>
    </div>

    <!-- STAT -->
    <div class="stat-card">

        <!-- MENUNGGU -->
        <div class="stat-item">
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6l4 2M12 22a10 10 0 100-20 10 10 0 000 20z"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Menunggu</span>
                <h2>100</h2>
            </div>
        </div>

        <!-- PROSES -->
        <div class="stat-item">
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 4v6h6M20 20v-6h-6M5 19a9 9 0 0114-7M19 5a9 9 0 01-14 7"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Proses</span>
                <h2>25</h2>
            </div>
        </div>

        <!-- SELESAI -->
        <div class="stat-item">
            <div class="stat-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Selesai</span>
                <h2>189</h2>
            </div>
        </div>

    </div>

    <!-- GRID -->
    <div class="dashboard-grid">
        <div class="card">
            <h3>Statistik Harian</h3>
            <p>Jumlah Pengaduan Harian</p>
            <div class="chart-container">
                <canvas id="chartPengguna"></canvas>
            </div>
        </div>

        <div class="card">
            <h3>Statistik Bulanan</h3>
            <p>Jumlah Pengaduan Bulanan</p>
            <div class="chart-container">
                <canvas id="chartPengaduan"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('chartPengguna'), {
    type: 'line',
    data: {
        labels: ['Senin','Selasa','Rabu','Kamis','Jumat'],
        datasets: [{
            data: [12,22,30,18,28],
            borderColor: '#dc2626',
            borderWidth: 4,
            tension: 0.6,
            cubicInterpolationMode: 'monotone',
            fill: true,
            backgroundColor: (ctx) => {
                const g = ctx.chart.ctx.createLinearGradient(0,0,0,300);
                g.addColorStop(0,'rgba(239,68,68,.35)');
                g.addColorStop(1,'rgba(239,68,68,0)');
                return g;
            },
            pointRadius: ctx => ctx.dataIndex === 2 ? 10 : 0,
            pointBackgroundColor: '#dc2626',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 5
        }]
    },
    options: {
        responsive:true,
        maintainAspectRatio:false,
        plugins:{
            legend:{ display:false },
            tooltip:{
                backgroundColor:'#ffffff',
                caretColor:'#ffffff',
                borderColor:'#e5e7eb',
                borderWidth:1,
                padding:18,
                borderRadius:12,
                displayColors:false,
                titleColor:'#111827',
                bodyColor:'#6b7280',
                callbacks:{
                    title:()=> 'Pengaduan Hari ini',
                    label:(ctx)=> ctx.raw+' Laporan'
                }
            }
        },
        scales:{
            x:{ grid:{ display:false }},
            y:{ display:false }
        }
    }
});

new Chart(document.getElementById('chartPengaduan'), {
    type: 'line',
    data: {
        labels: ['Feb','Mar','Apr','Mei','Jun'],
        datasets: [{
            data: [180,260,420,300,360],
            borderColor: '#2ea8df',
            borderWidth: 5,
            tension: 0.6,
            cubicInterpolationMode: 'monotone',
            fill: true,
            backgroundColor: (ctx) => {
                const g = ctx.chart.ctx.createLinearGradient(0,0,0,320);
                g.addColorStop(0,'rgba(46,168,223,.35)');
                g.addColorStop(1,'rgba(46,168,223,0)');
                return g;
            },
            pointRadius: ctx => ctx.dataIndex === 2 ? 12 : 0,
            pointBackgroundColor: '#2ea8df',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 6
        }]
    },
    options: {
        responsive:true,
        maintainAspectRatio:false,
        plugins:{
            legend:{ display:false },
            tooltip:{
                backgroundColor:'#ffffff',
                caretColor:'#ffffff',
                borderColor:'#e5e7eb',
                borderWidth:1,
                padding:18,
                borderRadius:12,
                displayColors:false,
                titleColor:'#111827',
                bodyColor:'#6b7280',
                callbacks:{
                    title:()=> 'Pengaduan Bulan ini',
                    label:()=> '600, 2026'
                }
            }
        },
        scales:{
            x:{ grid:{ display:false }},
            y:{ display:false }
        }
    }
});
</script>

@endsection