<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_gudang;
use App\Models\harga_barang_gudang;
use App\Models\satuan;
use Illuminate\Support\Facades\DB;

class BarangGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try{
            
            $search = $request->input('table_search');
            $paginate = $request->input('paginate',10);
            $type = $request->input('type','Langsung');

            $barangGudang = barang_gudang::select(
                'barang_gudangs.id',
                'barang_gudangs.nama_barang',
                'barang_gudangs.type_barang',
                'barang_gudangs.stok',
                'barang_gudangs.id_satuan',
                'harga_barang_gudangs.harga_barang'
            )
            ->leftJoin('harga_barang_gudangs', function ($join) {
                $join->on('barang_gudangs.id', '=', 'harga_barang_gudangs.id_barang_gudang')
                    ->whereRaw('harga_barang_gudangs.created_at = (SELECT MAX(h2.created_at) FROM harga_barang_gudangs h2 WHERE h2.id_barang_gudang = harga_barang_gudangs.id_barang_gudang)');
            })
            ->with('satuan:id,nama_satuan')
            ->when($search, function ($query) use ($search) {
                $query->where('barang_gudangs.nama_barang', 'like', '%' . $search . '%');
            })
            ->where('type_barang', $type)
            ->paginate($paginate);
        
            
            $satuan = satuan::select('id', 'nama_satuan')->get();

                
            return view('barang_gudang.index', compact('barangGudang','satuan'));
        }catch(\Exception $e){
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
            $request->validate(([
                'nama_barang' => 'required',
                'type_barang' => 'required',
                'stok' => 'required',
                'id_satuan' => 'required',
                'harga_barang' => 'required'
            ]));

            $barangGudang = barang_gudang::create([
                'nama_barang' => $request->nama_barang,
                'type_barang' => $request->type_barang,
                'stok' => $request->stok,
                'id_satuan' => $request->id_satuan
            ]);

            harga_barang_gudang::create([
                'id_barang_gudang' => $barangGudang->id,
                'harga_barang' => $request->harga_barang
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
        try {
            // dd($request->all(), $id);
            $request->validate([
                'nama_barang' => 'required',
                'type_barang' => 'required',
                'stok' => 'required',
                'id_satuan' => 'required',
                'harga_barang' => 'required'
            ]);

            $barangGudang = barang_gudang::findorfail($id);

            $barangGudang->update([
                'nama_barang' => $request->nama_barang,
                'type_barang' => $request->type_barang,
                'stok' => $request->stok,
                'id_satuan' => $request->id_satuan
            ]);
            harga_barang_gudang::where('id_barang_gudang', $id)->first();
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $barangGudang = barang_gudang::findorfail($id);
            $barangGudang->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
