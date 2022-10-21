<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // View Mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('id', 'desc')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa'));
        // return Mahasiswa::orderbY('id', 'desc')->paginate(10);
    }

    // Create Mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|max:11',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($request->post());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa has been created successfully.');
    }

    // Edit Mahasiswa
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|max:11',
            'alamat' => 'required',
        ]);

        $mahasiswa->fill($request->post())->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Has Been updated successfully');
    }

    // Delete Mahasiswa
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa has been deleted successfully');
    }
}
