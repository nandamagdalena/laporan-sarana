@extends('layouts.templatepengguna')

@section('content')

<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* Title & Breadcrumb */

.page-header{
    margin-bottom:25px;
    margin-left: 28px;
    margin-top: 30px
}

.page-title{
    font-size:26px;
    font-weight:700;
    color:#111827;
    margin-bottom:6px;
}


.breadcrumb-custom{
    display:flex;
    align-items:center;
    gap:6px;
    font-size:14px;
    color:#6b7280;
}

.breadcrumb-custom a{
    color:#2563eb;
    text-decoration:none;
}

.breadcrumb-custom a:hover{
    text-decoration:underline;
}

.breadcrumb-custom .active{
    color:#dc2626; /* merah */
    font-weight:500;
}

.form-box label{
    display:flex;
    align-items:center;
    gap:6px;
    font-weight:600;
    margin-bottom:6px;
}

.form-box label i{
    color:#2563eb;
    font-size:13px;
    cursor:pointer;
}

.form-box input{
    width:100%;
    padding:10px 12px;
    border:1.5px solid #2563eb;
    border-radius:8px;
    font-size:14px;
    outline:none;
}

.form-box input:focus{
    border-color:#1d4ed8;
    box-shadow:0 0 0 2px rgba(37,99,235,0.15);
}


.profile-card{
    background:#fff;
    border-radius:16px;
    padding:32px;
    max-width:1100px;   /* batas lebar */
    margin:30px auto;     /* bikin ke tengah */
}

.profile-img{
    width:110px;
    height:110px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #2563eb;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
}

.profile-info h5{
    margin:0;
    font-weight:700;
}

.profile-info p{
    margin:4px 0 0;
    color:#6b7280;
    font-size:14px;
}


/* GRID FORM */
.profile-form{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:24px;
    margin-top:20px;
}

/* Input Box */
.form-box{
    display:flex;
    flex-direction:column;
    margin-bottom:18px; /* jarak antar kolom */
}


.form-box label{
    font-weight:500;
    margin-bottom:6px;
}

.form-box input{
    height:42px;
    padding:8px 12px;
    border:1px solid #d1d5db;
    border-radius:8px;
    font-size:14px;

    width:85%;        /* jangan full */
    max-width:400px;  /* batas maksimal */
}


.form-footer{
    display:flex;
    justify-content:flex-end; /* dorong ke kanan */
    margin-top:30px;
}


/* Button */
.btn-save{
    background:#2563eb;
    color:#fff;
    border:none;
    padding:10px 26px;
    border-radius:8px;
    font-size:14px;
}

.btn-save:hover{
    background:#1e40af;
}

/* Password input + eye icon */
.password-wrapper{
    position: relative;
    width:85%;
    max-width:400px;
}

.password-wrapper input{
    width:100%;
    padding-right:40px; /* kasih ruang buat icon */
}


//* Paksa SEMUA input di password-wrapper tetap putih */
.password-wrapper input{
    background-color:#ffffff !important;
}

/* Saat berubah jadi text (eye dibuka) */
.password-wrapper input[type="text"]{
    background-color:#ffffff !important;
}

/* Chrome autofill & browser style */
.password-wrapper input:-webkit-autofill,
.password-wrapper input:-webkit-autofill:hover,
.password-wrapper input:-webkit-autofill:focus,
.password-wrapper input:-webkit-autofill:active{
    -webkit-box-shadow: 0 0 0 1000px #ffffff inset !important;
    box-shadow: 0 0 0 1000px #ffffff inset !important;
    -webkit-text-fill-color: #111827 !important;
}


.eye-icon{
    position:absolute;
    right:12px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#6b7280;
    font-size:14px;
}


.eye-icon:hover{
    color:#2563eb;
}

input::-ms-reveal,
input::-ms-clear {
    display: none;
}

input[type="password"]::-webkit-textfield-decoration-container {
    display: none !important;
}

input[type="password"]::-webkit-credentials-auto-fill-button {
    visibility: hidden;
}

.photo-overlay{
    position:absolute;
    top:0;
    left:0;
    width:110px;
    height:110px;
    border-radius:50%;
    background:rgba(0,0,0,0.4);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    opacity:0;
    transition:0.3s;
}

label:hover .photo-overlay{
    opacity:1;
}

</style>

<div class="container py-4">

    <div class="page-header">
        <div class="page-title">Profil</div>

        <div class="breadcrumb-custom">
            <i class="fa fa-home"></i>
            <a href="{{ route('user.dashboard') }}">Beranda</a>
            <span>></span>
            <span class="active">Profil</span>
        </div>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-card shadow-sm">

        {{-- Header --}}
        {{-- FOTO DI ATAS --}}
        <div style="text-align:center; margin-bottom:25px;">
            <div style="position:relative; width:110px; height:110px; margin:0 auto;">

                <label for="photoUpload" style="cursor:pointer; display:block; width:110px; height:110px;">

                    <img id="previewImage"
                        src="{{ auth()->user()->photo
                                ? asset('storage/' . auth()->user()->photo)
                                : asset('images/siswa.jpeg') }}"
                        class="profile-img"
                        alt="Avatar">

                    <div class="photo-overlay">
                        <i class="fa fa-camera"></i>
                    </div>

                </label>

            </div>

            <div style="margin-top:12px;">
                <h5 style="margin:0;font-weight:700;">
                    {{ auth()->user()->name }}
                </h5>
                <p style="margin:4px 0 0;color:#6b7280;font-size:14px;">
                    {{ auth()->user()->email }}
                </p>
            </div>

        </div>

        {{-- Form --}}
        <form action="{{ route('user.profile.update') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

            <div class="profile-form">

                <input type="file"
                id="photoUpload"
                name="photo"
                accept="image/*"
                style="display:none;">

                {{-- KIRI --}}
                <div>

                    <div class="form-box">
                        <label>
                            Nama Lengkap
                            <i class="fa-solid fa-pen"></i>
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ auth()->user()->name ?? '' }}">
                    </div>

                    <div class="form-box mt-3">
                        <label>
                            Email
                            <i class="fa-solid fa-envelope"></i>
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ auth()->user()->email ?? '' }}">
                    </div>

                    <div class="form-box mt-3">
                        <label>
                            No. Telepon
                            <i class="fa-solid fa-phone"></i>
                        </label>

                        <input type="text"
                               name="phone_number"
                               value="{{ auth()->user()->phone_number ?? '' }}">
                    </div>

                </div>

                {{-- KANAN --}}
                <div>
                <div class="form-box">
                        <label>
                            Kata Sandi
                            <i class="fa-solid fa-lock"></i>
                        </label>

                        <div class="password-wrapper">
                            <input type="password"
                                id="passwordInput"
                                name="password"
                                autocomplete="new-password">

                            <span class="eye-icon" id="togglePassword">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-box mt-3">
                        <label>
                            NIS
                            <i class="fa-solid fa-id-card"></i>
                        </label>

                        <input type="text"
                               name="nis"
                               value="{{ auth()->user()->nis ?? '' }}">
                    </div>

                    <div class="form-box mt-3">
                        <label>
                            Jenis Akun
                            <i class="fa-solid fa-user"></i>
                        </label>

                        <input type="text"
                               value="{{ auth()->user()->role ?? 'user' }}"
                               readonly>
                    </div>

                </div>

            </div>

            {{-- Button --}}
            <div class="form-footer">
                <button type="submit" class="btn-save">
                    Simpan
                </button>
            </div>

        </form>
<script>
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('passwordInput');
const icon = togglePassword.querySelector('i');

togglePassword.addEventListener('click', function () {

    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';

    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});

document.getElementById('photoUpload').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('previewImage').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});
</script>



    </div>
</div>

@endsection
