<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_jadi;

class barangJadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('table_search');
            $paginate = $request->input('paginate',10);

            $barangJadi = barang_jadi::select('id', 'nama_barang','harga_barang','stok')
                ->when($search, function($query) use ($search){
                    $query->where('nama_barang', 'like', '%'.$search.'%');
                })
            ->paginate($paginate);
            

            return view(('barang_jadi.index'),compact('barangJadi'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        try{
            $request->validate([
                'nama_barang' => 'required',
                'harga_barang' => 'required',
                'stok' => 'required'
            ]);

            barang_jadi::create([
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'stok' => $request->stok
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        try{
            $request->validate([
                'nama_barang' => 'required',
                'harga_barang' => 'required',
                'stok' => 'required'
            ]);

            $barangJadi = barang_jadi::find($id);
            $barangJadi->update([
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'stok' => $request->stok
            ]);

            return redirect()->back()->with('success', 'Data berhasil diubah'); 
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            $barangJadi = barang_jadi::find($id);
            $barangJadi->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
