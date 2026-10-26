<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; // Wajib ditambahkan untuk memanggil Model

class PelangganController extends Controller
{
    /**
     * Menampilkan daftar pelanggan (Read).
     */
     public function index()
    {
        // Sesuaikan dengan contoh dosen (menggunakan array $data)
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Menampilkan form tambah pelanggan (Create).
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Menyimpan data pelanggan baru ke database (Store).
     */
    public function store(Request $request)
    {
        // 1. Validasi Data (Sesuai Modul)
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email',
            'phone'      => 'required|numeric',
        ]);

        // 2. Menyiapkan data yang akan disimpan
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['birthday']   = $request->birthday;
        $data['gender']     = $request->gender;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;

        // 3. Simpan ke database menggunakan Model Pelanggan
        Pelanggan::create($data);

        // 4. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Pelanggan Berhasil');
    }

    /**
     * Menampilkan detail pelanggan (Show).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit pelanggan (Edit).
     */
    public function edit(string $id)
    {
        // Mengambil data pelanggan berdasarkan ID
        $dataPelanggan = Pelanggan::findOrFail($id);
        
        // Sesuaikan 'admin.pelanggan.edit' dengan nama file blade edit kamu
        return view('admin.pelanggan.edit', compact('dataPelanggan'));
    }

    /**
     * Mengupdate data pelanggan di database (Update).
     */
    public function update(Request $request, string $id)
    {
        // 1. Validasi Data (Sama seperti store)
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email',
            'phone'      => 'required|numeric',
        ]);

        // 2. Cari data yang akan diupdate
        $pelanggan = Pelanggan::findOrFail($id);

        // 3. Update data
        $pelanggan->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $request->birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        // 4. Redirect kembali ke halaman index
        return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan Berhasil Diupdate');
    }

    /**
     * Menghapus data pelanggan dari database (Destroy).
     */
    public function destroy(string $id)
    {
        // Cari data berdasarkan ID lalu hapus
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        // Redirect kembali ke halaman index
        return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan Berhasil Dihapus');
    }
}