<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function index()
    {
        $data = MasterCategory::all();
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
}
