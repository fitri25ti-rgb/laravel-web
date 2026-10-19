<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'       => 'required|max:10',
            'email'      => ['required', 'email'],
            'pertanyaan' => 'required|max:300|min:8',
        ], [
            'nama.required'       => 'Nama tidak boleh kosong',
            'email.email'         => 'Email tidak valid',
            'pertanyaan.required' => 'Pertanyaan tidak boleh kosong',
        ]);

        // Mengirimkan hasil validasi ke session responData
        return redirect()->back()->with('responData', $validated);
    }
}