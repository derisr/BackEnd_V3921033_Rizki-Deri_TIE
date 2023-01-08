<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::paginate(10);
        return response()->json([
            'data' => $fasilitas
        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fasilitas = Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'id_fasilitas' => $request->id_fasilitas,
            'jumlah_produk' => $request->jumlah_produk
        ]);
        return response()->json([
            'data' => $fasilitas
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $fasilitas = Fasilitas::find($id);
        $fasilitas = Fasilitas::where('id', $id)->get();
        return response()->json([
            'data' => $fasilitas
        ]);
    }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Fasilitas  $fasilitas
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Fasilitas $fasilitas)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->id_fasilitas = $request->id_fasilitas;
        $fasilitas->jumlah_produk = $request->jumlah_produk;
        $fasilitas->save();
        

        return response()->json([
            'data' => $fasilitas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        return response()->json([
            'message' => 'fasilitas deleted'
        ], 204);
    }
}
