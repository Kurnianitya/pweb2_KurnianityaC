<?php

namespace App\Http\Controllers;

use App\Models\DataKamar;
use Illuminate\Http\Request;

class datakamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datakamar.data_kamar');
    }

    public function read()
    {
        $data = DataKamar::all();
        return view('datakamar.data_kamar',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datakamar.create_kamar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DataKamar::create([
            'nomor' => $request->input('nomor'),
            'kapasitas' => $request->input('kapasitas'),
            'fasilitas' => $request->input('fasilitas'),
            'biaya' => $request->input('biaya'),
        ]);

        return redirect('data_kamar')->with('toast_success','Data Berhasil Disimpan');

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
        $data = DataKamar::find($id);
        return view('datakamar.edit_kamar',['data' => $data]);
        // return view('datakamar.edit_kamar',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = DataKamar::find($id);
        $data->update($request->except(['_token','submit']));
        // $data->update($request->all());
        return redirect('data_kamar')->with('toast_success','Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DataKamar::findorfail($id);
        $data->delete();
        return redirect('data_kamar')->with('toast_success','Data Berhasil Dihapus');
    }
}
