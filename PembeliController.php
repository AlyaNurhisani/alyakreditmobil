<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pembeli.index', [
            'pembelis' => pembeli::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ktp_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'alamat_pembeli' => 'required',
            'telp_pembeli' => 'required'
        ]);

        Pembeli::create($validatedData);

        return redirect('/dashboard/pembeli')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('dashboard.pembeli.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        return view('dashboard.pembeli.edit', [
            'pembeli' => $pembeli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $validatedData = $request->validate([
            'ktp_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'alamat_pembeli' => 'required',
            'telp_pembeli' => 'required'
        ]);

        Pembeli::where('id', $pembeli->id)
            ->update($validatedData);

        return redirect('/dashboard/pembeli')->with('success', 'Data has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mobil::destroy($mobil->kode_mobil);

        // return redirect('/dashboard/mobil')->with('success', 'Post has been deleted!');
        $validatedData = Pembeli::find($id);
        $validatedData->delete();
        return redirect('/dashboard/pembeli');
    }
}
