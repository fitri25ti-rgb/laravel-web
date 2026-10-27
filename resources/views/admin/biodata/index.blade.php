<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Biodata</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Biodata</h4>
            <a href="{{ route('biodata.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($biodata as $item)
                    <tr>
                        <td>
                            @if($item->photo)
                                <img src="{{ asset('foto_biodata/'.$item->photo) }}" width="50" height="50" style="object-fit:cover; border-radius:50%;">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>
                            <a href="{{ route('biodata.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('biodata.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('biodata.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>