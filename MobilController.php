<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mobil.index', [
            'mobils' => mobil::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mobil.create');
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
            'kode_mobil' => 'required',
            'merek_mobil' => 'required',
            'tipe_mobil' => 'required',
            'warna_mobil' => 'required',
            'harga_mobil' => 'required',
            'gambar_mobil' => 'image|file'
        ]);

        if($request->file('gambar_mobil')) {
            $validatedData['gambar_mobil'] = $request->file('gambar_mobil')->store('post-images');
        }

        Mobil::create($validatedData);

        return redirect('/dashboard/mobil')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('dashboard.mobil.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil)
    {
        return view('dashboard.mobil.edit', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        $validatedData = $request->validate([
            'kode_mobil' => 'required',
            'merek_mobil' => 'required',
            'tipe_mobil' => 'required',
            'warna_mobil' => 'required',
            'harga_mobil' => 'required',
            'gambar_mobil' => 'image|file'
        ]);

        if($request->file('gambar_mobil')) {
            $validatedData['gambar_mobil'] = $request->file('gambar_mobil')->store('post-images');
        }

        Mobil::where('id', $mobil->id)
            ->update($validatedData);

        return redirect('/dashboard/mobil')->with('success', 'Post has been edited!');
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
        $validatedData = Mobil::find($id);
        $validatedData->delete();
        return redirect('/dashboard/mobil')->with('success', 'Post has been deleted!');
    }
}
