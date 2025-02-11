<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_masuk;
use Illuminate\Support\Facades\DB;

class barangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{

            $search = $request->input('table_search');
            $paginate = $request->input('paginate',10);
            $barangMasuk = DB::table('barang_masuks')
            ->join('barang_gudangs', 'barang_masuks.id_barang_gudang', '=', 'barang_gudangs.id')
            ->join('satuan', 'barang_gudangs.id_satuan', '=', 'satuan.id')
            ->select('barang_masuks.id','barang_masuks.id_barang_gudang','barang_masuks.jumlah','barang_masuks.tanggal','barang_gudangs.nama_barang','satuan.nama_satuan')
            ;
        
            dd($barangMasuk);

            return view(('barang_masuk.index'),compact('barangMasuk'));
            
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
        //
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
