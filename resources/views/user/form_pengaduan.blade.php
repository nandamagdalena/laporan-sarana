@extends('layouts.templatepengguna')

@section('title', 'Dashboard')

@section('content')

<style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    .main {
        padding: 20px;
        width: 100%;
        background: #f4f6f9;
    }

    .breadcrumb {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .breadcrumb .active {
        color: red;
        font-weight: bold;
    }

    /* CARD */
    .card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,.05);
    }

    .card-header {
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
    }

    textarea {
        resize: none;
    }

    /* UPLOAD */
    .upload-box {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        cursor: pointer;
    }

    .upload-box input {
        display: none;
    }

    /* FOOTER */
    .card-footer {
        margin-top: 20px;
        background: #fff;
        border-radius: 12px;
        padding: 15px 25px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,.05);
    }

    .btn {
        padding: 8px 22px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .btn-secondary {
        background: #9ca3af;
        color: #fff;
    }

    .btn-primary {
        background: #0059A8;
        color: #fff;
    }

    /* POPUP */
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.4);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }
    .popup-box {
        background: #fff;
        width: 440px;
        border-radius: 20px;
        padding: 28px 24px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0,0,0,.15);
        animation: popupScale .3s ease;
    }

    @keyframes popupScale {
        from { transform: scale(.8); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    /* ICON */
    .popup-icon {
        position: relative;
        font-size: 52px;
        margin-bottom: 10px;
    }

    .popup-icon .check {
        position: absolute;
        right: -8px;
        bottom: -6px;
        background: #22c55e;
        color: #fff;
        border-radius: 50%;
        font-size: 16px;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* TEXT */
    .popup-box h4 {
        color: #16a34a;
        margin-bottom: 8px;
        font-size: 23px;
        line-height: 1;
    }

    .popup-box p {
        color: #6b7280;
        font-size: 17px;
        line-height: 1.4;
    }

    /* IMAGE */
    .popup-image {
        width: 120px;
        margin: 8px auto;
        display: block;
    }

    /* IMAGE + GARIS */
    .popup{
        width: 200px;                 /* ⬅️ ini bikin garis lebih panjang */
        margin: 12px auto;
        display: block;
        padding-bottom: 12px;         /* jarak ke garis */
        border-bottom: 2px solid #e5e7eb;
    }

    /* khusus gambar di dalam popup */
    .popup img{
        width: 120px;                 /* ⬅️ gambar jadi lebih besar */
        display: block;
        margin: 0 auto;
    }



    /* BUTTON */
    .btn-ok {
        background: #22c55e;
        color: #fff;
        border: none;
        padding: 10px 32px;
        border-radius: 10px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 25px;
    }

    .btn-ok:hover {
        background: #16a34a;
    }

    
</style>


<div class="main">

    <h3>Form Pengaduan</h3>

    <div class="breadcrumb">
        🏠 Beranda &gt; <span class="active">Form Pengaduan</span>
    </div>

    <form action="{{ route('user.form_pengaduan') }}"
          method="POST"
          enctype="multipart/form-data"
          onsubmit="return false;">
        @csrf

        <div class="card">

            <div class="card-header">
                <h4>Data Pengaduan</h4>
                <small>Lengkapi data pengaduan dengan benar dan jelas.</small>
            </div>

            <div style="display:grid;grid-template-columns:1fr 300px;gap:30px;">

                <div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option>Pilih Kategori</option>
                            <option>Kelas</option>
                            <option>Toilet</option>
                            <option>Ruang Guru</option>
                            <option>Uks</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" rows="5" class="form-control"></textarea>
                    </div>
                </div>

                <div>
                    <label>Bukti</label>
                    <label class="upload-box">
                        📷 Unggah Gambar
                        <input type="file" name="bukti">
                    </label>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="reset" class="btn btn-secondary">Batal</button>
            <button type="button" class="btn btn-primary" onclick="showSuccessPopup()">Kirim</button>
        </div>
    </form>
</div>


<div class="popup-overlay" id="popupSuccess">
    <div class="popup-box">
        <img src="{{ asset('images/senyum.png') }}" class="popup-image">
        <h4>Terima kasih atas laporan Anda!</h4>
        <p>Pengaduan sarana sekolah telah berhasil dikirim dan sedang menunggu peninjauan.</p>
        <img src="{{ asset('images/popup.png') }}" class="popup">
        <button class="btn-ok" id="btnOk">OK</button>
    </div>
</div>


<script>
function showSuccessPopup() {
    document.getElementById('popupSuccess').style.display = 'flex';
}

document.getElementById('btnOk').addEventListener('click', function () {
    window.location.href = "{{ route('user.form_pengaduan') }}";
});
</script>

@endsection