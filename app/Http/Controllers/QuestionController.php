<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\View

lass QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama'       => 'required|max:10',
        'email'      => ['required', 'email'],
        'pertanyaan' => 'required|max:300|min:8',
    ], [
        // Tambahkan pesan custom di sini
        'nama.required'  => 'Nama tidak boleh kosong',
        'email.email'    => 'Email tidak valid',
        // Anda juga bisa menambahkan pesan untuk kolom pertanyaan seperti contoh di gambar
        'pertanyaan.required' => 'Pertanyaan tidak boleh kosong',
    ]);

        // dd($request->all()); 
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['pertanyaan'] = $request->pertanyaan;

        return view('home-question-respon', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
