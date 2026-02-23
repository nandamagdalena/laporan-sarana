<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

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

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px;
        }

        .left-section {
            color: #fff;
        }

        .left-section h1 {
            font-weight: 700;
            font-size: 32px;
        }

        .left-section h2 {
            font-weight: 600;
            font-size: 20px;
            margin-top: 15px;
        }

        .left-section p {
            font-size: 14px;
            opacity: 0.9;
        }

      .form-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            transform: translate(-5px, -45px) scale(0.85);
            transform-origin: top center;
        }


         /* SUB JUDUL (2 BARIS BOLD) */
        .laporku-text h5 {
            font-weight: 700;
            margin-bottom: 10px;     /* jarak ke paragraf */
            line-height: 1.15;       /* PENTING → supaya 2 baris rapat */
            font-size: 1.05rem;
            letter-spacing: 0.3px;
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

         /* NAMA SEKOLAH */
        .school-name {
            font-weight: normal;
        }
          /* PARAGRAF */
        .laporku-text p {
            margin-top: 0;
            line-height: 1.3;
            opacity: 0.9;
        }

         /* LOGO ATAS */
        .logo-atas {
            width: 240px;
            transform: translate(40px, -50px);
        }

         /* ILUSTRASI BAWAH */
        .laporanku-img {
            width: 100%;
            max-width: 470px;
            transform: translate(80px, -150px);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 45px;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }

        .btn-primary {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
        }

        .error-text {
            font-size: 12px;
            color: red;
            margin-top: 5px;
        }

        .is-invalid {
    border-color: #dc3545;
}

        input[type="password"]::-webkit-password-eye {
            display: none;
        }
        input[type="password"]::-ms-reveal {
            display: none;
        }

        /* MATIKAN ICON ERROR BAWAAN BOOTSTRAP */
.form-control.is-invalid {
    background-image: none !important;
    padding-right: 45px !important; /* biar icon mata tetap */
}

/* JAGA POSISI ICON */
.position-relative {
    position: relative;
}

.input-icon,
.toggle-password {
    z-index: 5;
}

/* Biar input tidak geser */
.form-control {
    box-shadow: none !important;
}

/* KUNCI TINGGI INPUT */
.position-relative {
    height: 52px; /* samakan dengan tinggi input */
}

/* ERROR JANGAN NGEDORONG LAYOUT */
.error-text {
    position: absolute;
    bottom: -18px;
    left: 0;
    margin: 0;
    font-size: 12px;
}


    </style>
</head>
<body>

<div class="container-fluid auth-wrapper">
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

        {{-- RIGHT FORM --}}
        <div class="col-lg-7 offset-lg-1">
            <div class="form-card">

           <form id="registerForm" action="{{ route('register') }}" method="POST">
                @csrf

                    {{-- Nama --}}
                    <label class="form-label">Nama</label>
                    <input type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama Anda">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    {{-- Email --}}
                    <label class="form-label">Email</label>
                    <input type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email Anda">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    {{-- NIS --}}
                    <label class="form-label">NIS</label>
                    <input type="text"
                        name="nis"
                        value="{{ old('nis') }}"
                        class="form-control @error('nis') is-invalid @enderror"
                        placeholder="Masukkan NIS Anda">
                    @error('nis')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    {{-- Telepon --}}
                    <label class="form-label">Telepon</label>
                    <input type="text"
                        name="phone_number"
                        value="{{ old('phone_number') }}"
                        class="form-control @error('phone_number') is-invalid @enderror"
                        placeholder="Masukkan no telepon Anda">

                    @error('phone_number')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    {{-- Password --}}
                    <label class="form-label">Password</label>
                    <div class="mb-1 position-relative">
                        <i class="bi bi-lock input-icon"></i>

                        <input type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan password">

                        <i class="bi bi-eye-slash toggle-password"
                        onclick="togglePassword('password', this)"></i>

                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Konfirmasi --}}
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="mb-1 position-relative">
                        <i class="bi bi-lock input-icon"></i>

                        <input type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Konfirmasi password">

                        <small id="password-error" class="error-text d-none">
                            konfirmasi password anda salah
                        </small>

                        <i class="bi bi-eye-slash toggle-password"
                        onclick="togglePassword('password_confirmation', this)"></i>
                    </div>

                 <button type="submit" class="btn btn-primary w-100 mt-4">
                    Daftar
                </button>
                <div class="text-center mt-3">
                        </a>
                          <p class="text-center mt-3 small-text">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="fw-bold text-decoration-none">
                            Login
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    window.togglePassword = function(id, icon) {
        const input = document.getElementById(id);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            input.type = "password";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        }
    };

});
</script>
</body>
</html>
