<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Biodata</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header"><h4>Tambah Biodata</h4></div>
        <div class="card-body">
            <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Data Utama -->
                <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required></div>
                <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea></div>
                <div class="mb-3"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required></div>
                <div class="mb-3"><label>No HP</label><input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required></div>
                <div class="mb-3"><label>Photo Profil</label><input type="file" name="photo" class="form-control"></div>

                <hr>
                <h5 class="mt-4 mb-3">Data Tambahan (Pendidikan & Hobi)</h5>
                
                <div class="mb-3"><label>Pendidikan</label><input type="text" name="pendidikan" class="form-control" value="{{ old('pendidikan') }}"></div>
                <div class="mb-3"><label>Hobi</label><input type="text" name="hobi" class="form-control" value="{{ old('hobi') }}"></div>
                <div class="mb-3"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama') }}"></div>
                <div class="mb-3"><label>Golongan Darah</label><input type="text" name="golongan_darah" class="form-control" value="{{ old('golongan_darah') }}"></div>

                <hr>
                <h5 class="mt-4 mb-3">Data Keluarga</h5>

                <div class="mb-3"><label>Nama Ayah</label><input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah') }}"></div>
                <div class="mb-3"><label>Pekerjaan Ayah</label><input type="text" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah') }}"></div>
                <div class="mb-3"><label>Nama Ibu</label><input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}"></div>
                <div class="mb-3"><label>Pekerjaan Ibu</label><input type="text" name="pekerjaan_ibu" class="form-control" value="{{ old('pekerjaan_ibu') }}"></div>
                <div class="mb-3"><label>Anak Ke</label><input type="text" name="anak_ke" class="form-control" value="{{ old('anak_ke') }}"></div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                <a href="{{ route('biodata.index') }}" class="btn btn-secondary mt-3">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>