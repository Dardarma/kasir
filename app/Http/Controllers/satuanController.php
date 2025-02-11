<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\satuan;


class satuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('table_search');
            $paginate = $request->input('paginate',10);

            $satuan = satuan::select('id', 'nama_satuan')
                ->when($search, function($query) use ($search){
                    $query->where('nama_satuan', 'like', '%'.$search.'%');
                })
            ->paginate($paginate);

            return view(('satuan.index'),compact('satuan'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            satuan::create([
                'nama_satuan' => $request->input('nama_satuan')
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
            $satuan = satuan::findorfail($id);

            $satuan->update([
                'nama_satuan' => $request->input('nama_satuan')
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
            $satuan = satuan::findorfail($id);
            $satuan->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
