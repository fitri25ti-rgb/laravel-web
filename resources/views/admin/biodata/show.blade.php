<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Biodata - Fitri Mutia</title>
    <style>
        /* CSS Simpel untuk mempercantik tampilan biodata */
        body { 
            font-family: 'Georgia', serif; 
            background-color: #fdf5e6; 
            color: #5c4033; 
            padding: 20px; 
            margin: 0;
        }
        .biodata-card { 
            max-width: 800px; 
            margin: 20px auto; 
            background: #fff8dc; 
            border: 2px solid #d4af37; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .header { 
            text-align: center; 
            border-bottom: 2px dashed #d4af37; 
            padding-bottom: 10px; 
            margin-bottom: 20px; 
        }
        .header h2 {
            margin: 0;
            letter-spacing: 2px;
            color: #5c4033;
        }
        .content { 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-start;
        }
        .details-left { 
            width: 65%; 
        }
        .details-left h3 { 
            color: #d4af37; 
            margin-top: 20px;
            margin-bottom: 10px; 
            font-size: 1.1rem;
            letter-spacing: 1px;
            border-bottom: 1px solid #e0cda0;
            display: inline-block;
        }
        .row { 
            display: flex; 
            margin-bottom: 5px; 
            font-size: 14px;
        }
        .label { 
            width: 130px; 
            font-weight: normal; 
        }
        .colon { 
            width: 20px; 
        }
        .photo-box { 
            width: 30%; 
            text-align: center; 
            margin-top: 20px;
        }
        .photo-box img { 
            width: 100%; 
            max-width: 180px; 
            border-radius: 50%; 
            border: 3px solid #d4af37; 
            object-fit: cover; 
            height: 180px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-action {
            display: inline-block;
            text-decoration: none; 
            background: #d4af37; 
            color: white; 
            padding: 10px 20px; 
            border-radius: 5px;
            font-weight: bold;
            margin: 0 5px;
            transition: background 0.3s;
        }
        .btn-action:hover {
            background: #b5952f;
        }
    </style>
</head>
<body>

<div class="biodata-card">
    <div class="header">
        <h2>PROFILE DETAILS</h2>
    </div>
    
    <div class="content">
        <!-- Bagian Kiri: Teks Data -->
        <div class="details-left">
            
            <!-- BAGIAN 1: DATA UTAMA (Diambil dari Database) -->
            <h3>PROFILE DETAILS:</h3>
            <div class="row"><div class="label">Nama Lengkap</div><div class="colon">:</div><div>{{ $biodata->nama_lengkap }}</div></div>
            <div class="row"><div class="label">NIM</div><div class="colon">:</div><div>2555301075</div></div>
            <div class="row"><div class="label">Kelas</div><div class="colon">:</div><div>2 TI A</div></div>
            <div class="row"><div class="label">Tanggal Lahir</div><div class="colon">:</div><div>{{ $biodata->tanggal_lahir }}</div></div>
            <div class="row"><div class="label">Alamat</div><div class="colon">:</div><div>{{ $biodata->alamat }}</div></div>
            <div class="row"><div class="label">No. HP</div><div class="colon">:</div><div>{{ $biodata->no_hp }}</div></div>
            <div class="row"><div class="label">Skill</div><div class="colon">:</div><div>Desain & Pemrograman</div></div>
            
            <!-- BAGIAN 2: PENDIDIKAN & HOBI (Diambil dari Database) -->
            <h3>PENDIDIKAN & HOBI:</h3>
            <div class="row"><div class="label">Pendidikan</div><div class="colon">:</div><div>{{ $biodata->pendidikan ?? '-' }}</div></div>
            <div class="row"><div class="label">Hobi</div><div class="colon">:</div><div>{{ $biodata->hobi ?? '-' }}</div></div>
            <div class="row"><div class="label">Agama</div><div class="colon">:</div><div>{{ $biodata->agama ?? '-' }}</div></div>
            <div class="row"><div class="label">Golongan Darah</div><div class="colon">:</div><div>{{ $biodata->golongan_darah ?? '-' }}</div></div>

            <!-- BAGIAN 3: KELUARGA (Diambil dari Database) -->
            <h3>FAMILY DETAILS:</h3>
            <div class="row"><div class="label">Nama Ayah</div><div class="colon">:</div><div>{{ $biodata->nama_ayah ?? '-' }}</div></div>
            <div class="row"><div class="label">Pekerjaan Ayah</div><div class="colon">:</div><div>{{ $biodata->pekerjaan_ayah ?? '-' }}</div></div>
            <div class="row"><div class="label">Nama Ibu</div><div class="colon">:</div><div>{{ $biodata->nama_ibu ?? '-' }}</div></div>
            <div class="row"><div class="label">Pekerjaan Ibu</div><div class="colon">:</div><div>{{ $biodata->pekerjaan_ibu ?? '-' }}</div></div>
            <div class="row"><div class="label">Anak Ke</div><div class="colon">:</div><div>{{ $biodata->anak_ke ?? '-' }}</div></div>
        </div>

        <!-- ========================================== -->
        <!-- BAGIAN KANAN: FOTO (LANGSUNG DIPANGGIL)    -->
        <!-- ========================================== -->
        <div class="photo-box">
            <!-- Pastikan nama file 'potoo.jpg' di bawah ini SAMA PERSIS dengan nama file di folder public/foto_biodata -->
            <img src="{{ asset('foto_biodata/potoo.jpg') }}" alt="Foto Profil">
        </div>
    </div>
    
    <!-- Tombol Aksi -->
    <div style="text-align: center; margin-top: 30px; border-top: 1px dashed #d4af37; padding-top: 20px;">
        <a href="{{ route('biodata.edit', $biodata->id) }}" class="btn-action">Edit Biodata</a>
    </div>
</div>

</body>
</html>