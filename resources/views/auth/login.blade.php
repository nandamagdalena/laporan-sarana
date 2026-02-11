<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
      body {
    min-height: 100vh;
    margin: 0;
    font-family: 'Poppins', sans-serif;

    /* Biru gradasi lembut & profesional */
    background: linear-gradient(
        135deg,
        #0d47a1 0%,
        #1565c0 35%,
        #1e88e5 70%,
        #42a5f5 100%
    );
}

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px;
        }

        /* ================= KIRI ================= */
        .login-left {
            color: #fff;
        }

        /* LOGO ATAS */
        .logo-atas {
            width: 240px;
            transform: translate(40px, -50px);
        }

       /* TEXT LAPORKU */
        .laporku-text {
            transform: translate(140px, -90px);
            color: #fff;
        }

        /* JUDUL UTAMA */
        .laporku-text h4 {
            font-weight: 700;
            margin-bottom: 4px;      /* rapatkan ke h5 */
            line-height: 1.1;
        }

        /* SUB JUDUL (2 BARIS BOLD) */
        .laporku-text h5 {
            font-weight: 700;
            margin-bottom: 10px;     /* jarak ke paragraf */
            line-height: 1.15;       /* PENTING → supaya 2 baris rapat */
            font-size: 1.05rem;
            letter-spacing: 0.3px;
        }

        /* PARAGRAF */
        .laporku-text p {
            margin-top: 0;
            line-height: 1.3;
            opacity: 0.9;
        }

        /* NAMA SEKOLAH */
        .school-name {
            font-weight: normal;
        }

       
        /* ILUSTRASI BAWAH */
        .laporanku-img {
            width: 90%;
            max-width: 470px;
            transform: translate(80px, -150px);
        }

        /* ================= KANAN ================= */
        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            transform: translate(-90px, -100px);
        }

        .login-card h4 {
            font-weight: 700;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
        }

        .btn-login {
            background: #0b5ed7;
            color: #fff;
            border-radius: 25px;
            padding: 10px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #084298;
        }

        .small-text {
            font-size: 13px;
        }
* PAKSA INPUT & ICON PUTIH */
.form-control,
.form-control:focus,
.input-group .form-control,
.input-group-text {
    background-color: #fff !important;
    box-shadow: none !important;
}



/* HILANGKAN WARNA AUTOFILL CHROME */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0 1000px #fff inset !important;
    box-shadow: 0 0 0 1000px #fff inset !important;
    -webkit-text-fill-color: #000 !important;
    transition: background-color 9999s ease-in-out 0s;
}

    </style>
</head>
<body>

<div class="container-fluid login-wrapper">
    <div class="row w-100 align-items-center">

       {{-- LOGO ATAS --}}
        <img src="{{ asset('images/logo.png') }}" class="logo-atas">

        {{-- TEXT --}}
        <div class="laporku-text">
            <h4 class="fw-bold">LAPORKU!</h4>
            <h5 class="fw-bold">SATU LAPORAN, PERUBAHAN NYATA</h5>

            <p class="mt-3">
            Pengaduan sarana dan prasarana sekolah <br>
            <strong class="school-name">SMKN 4 BOJONEGORO</strong>
        </p>

        </div>
                    <img src="{{ asset('images/laporankulogo.png') }}"
                        class="laporanku-img"
                        alt="Ilustrasi Laporku">

                </div>

        {{-- BAGIAN KANAN --}}
        <div class="col-md-5 offset-md-1">
            <div class="login-card">
                <h4 class="mb-1">Selamat Datang 👋</h4>
                <p class="text-muted small-text mb-4">
                    Silakan lakukan pendaftaran akun dengan
                    mengisi data secara lengkap dan benar
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
    <label class="form-label">Email</label>

    <div class="input-group">
        <span class="input-group-text bg-white">
            <i class="bi bi-envelope"></i>
        </span>
        <input type="email" 
               name="email"
               value="{{ old('email') }}"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Masukkan email Anda">
    </div>

    {{-- VALIDASI EMAIL --}}
    @error('email')
        <small class="text-danger d-block mt-1">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Password</label>

    <div class="input-group">
        <span class="input-group-text bg-white">
            <i class="bi bi-lock"></i>
        </span>

        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Masukkan kata sandi Anda">

        <!-- ICON MATA -->
        <span class="input-group-text bg-white" style="cursor: pointer;"
              onclick="togglePassword()">
            <i class="bi bi-eye-slash" id="eyeIcon"></i>
        </span>
    </div>

    {{-- VALIDASI PASSWORD --}}
    @error('password')
        <small class="text-danger d-block mt-1">
            {{ $message }}
        </small>
    @enderror
    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" value="Login" class="btn btn-login">Masuk</button>
                    </div>

                    <p class="text-center mt-3 small-text">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="fw-bold text-decoration-none">
                            Daftar
                        </a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("bi-eye-slash");
        eyeIcon.classList.add("bi-eye");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("bi-eye");
        eyeIcon.classList.add("bi-eye-slash");
    }
}
</script>


</body>
</html>
