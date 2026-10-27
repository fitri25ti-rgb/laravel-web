<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Menampilkan detail biodata secara langsung (Read).
     */
    public function index()
    {
        // Mengambil data pertama (data kamu) dari database
        $biodata = Biodata::first(); 

        // Jika data ada, langsung tampilkan halaman kartu biodata (show)
        if ($biodata) {
            return view('admin.biodata.show', compact('biodata'));
        }

        // Jika database kosong, arahkan ke form tambah data
        return redirect()->route('biodata.create');
    }

    /**
     * Menampilkan form tambah biodata (Create).
     */
    public function create()
    {
        return view('admin.biodata.create');
    }

    /**
     * Menyimpan data biodata baru ke database (Store).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi foto (maks 2MB)
        ]);

        $data = $request->all();

        // Logika Upload Foto
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('foto_biodata'), $nama_file);
            $data['photo'] = $nama_file;
        }

        // Simpan SEMUA kolom secara eksplisit agar tidak ada yang terlewat
        Biodata::create([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'photo' => $data['photo'] ?? null,
            'pendidikan' => $request->pendidikan,
            'hobi' => $request->hobi,
            'agama' => $request->agama,
            'golongan_darah' => $request->golongan_darah,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'anak_ke' => $request->anak_ke,
        ]);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil ditambahkan');
    }

    /**
     * Menampilkan detail biodata (Show).
     */
    public function show(Biodata $biodata)
    {
        return view('admin.biodata.show', compact('biodata'));
    }

    /**
     * Menampilkan form edit biodata (Edit).
     */
    public function edit(Biodata $biodata)
    {
        return view('admin.biodata.edit', compact('biodata'));
    }

    /**
     * Mengupdate data biodata di database (Update).
     */
    public function update(Request $request, Biodata $biodata)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Logika Upload Foto Baru (jika ada)
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('foto_biodata'), $nama_file);
            $data['photo'] = $nama_file;
        }

        // Update SEMUA kolom secara eksplisit
        $biodata->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'photo' => $data['photo'] ?? $biodata->photo, // Pakai foto lama jika tidak upload baru
            'pendidikan' => $request->pendidikan,
            'hobi' => $request->hobi,
            'agama' => $request->agama,
            'golongan_darah' => $request->golongan_darah,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'anak_ke' => $request->anak_ke,
        ]);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil diupdate');
    }

    /**
     * Menghapus data biodata dari database (Destroy).
     */
    public function destroy(Biodata $biodata)
    {
        $biodata->delete();
        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil dihapus');
    }
}