<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $books = Buku::all();
        return view('buku', compact('books'));
    }

    public function create()
    {
        return view('formBuku');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());

        Buku::create($data);

        return redirect()->action([BukuController::class, 'index'])
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('formBuku', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $buku = Buku::findOrFail($id);
        $buku->update($data);

        return redirect()->action([BukuController::class, 'index'])
                         ->with('success', 'Buku berhasil diperbarui.');
    }

    public function delete($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->action([BukuController::class, 'index'])
                         ->with('success', 'Buku berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'integer', 'between:1801,2026'],
        ];
    }

    private function messages(): array
    {
        return [
            'judul.required' => 'Judul harus diisi.',
            'judul.string' => 'Judul harus berupa string.',
            'penulis.required' => 'Penulis harus diisi.',
            'penulis.string' => 'Penulis harus berupa string.',
            'penerbit.required' => 'Penerbit harus diisi.',
            'penerbit.string' => 'Penerbit harus berupa string.',
            'tahun_terbit.required' => 'Tahun terbit harus diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.between' => 'Tahun terbit harus di antara tahun 1800-2026.',
        ];
    }
}
