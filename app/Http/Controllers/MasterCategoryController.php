<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class MasterCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterCategory::query();

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('kode')) {
            $query->where('kode', 'like', '%' . $request->kode . '%');
        }

        // pakai paginate jika mau, atau ->get()
        $data = $query->paginate(10);
        return view('master-category.index', compact('data'));
    }

    public function formView($method, $id = null)
    {
        $item = null;

        if ($method == 'edit') {
            $item = MasterCategory::findOrFail($id);
        }

        return view('master-category.form', compact('method', 'item'));
    }

    public function formSubmit(Request $request, $method, $id = null)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        if ($method == 'edit') {
            $data = MasterCategory::findOrFail($id);
            $data->update([
                'nama' => $request->nama
            ]);
        } else {
            MasterCategory::create([
                'nama' => $request->nama
            ]);
        }

        return redirect('/master-category')->with('success', 'Data kategori berhasil disimpan.');
    }

    public function delete($id)
    {
        MasterCategory::findOrFail($id)->delete();
        return redirect('/master-category')->with('success', 'Data kategori berhasil dihapus.');
    }

    public function detail($id)
    {
        $kategori = MasterCategory::with('items')->findOrFail($id);

        return view('master-category.detail', compact('kategori'));
    }

    public function printPDF($id)
    {
        $kategori = MasterCategory::with('items')->findOrFail($id);

        $pdf = Pdf::loadView('master-category.print', [
            'kategori' => $kategori,
            'tanggal' => now()->format('d/m/Y'),
            'waktu' => now()->format('H:i:s')
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('kategori-' . $kategori->kode . '.pdf');
    }
}
