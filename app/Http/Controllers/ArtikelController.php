<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        // dd($artikel);
        return view('artikel.index', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:3',
            'gambar_artikel' => 'mimes:png,jpg,jpeg'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');

        Artikel::create($data);
        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        $kategori = kategori::all();
        return view('artikel.update', ['artikel' => $artikel, 'kategori' => $kategori], compact('artikel'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        if (empty($request->file('gambar_artikel'))) {
            $artikel->update([
                'judul' => $request->judul,
                'slug' => $request->slug,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
            ]);
         
            return redirect('/artikel');
        } else {
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul' => $request->judul,
                'slug' => $request->slug,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
            ]);
        
            return redirect('/artikel');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect('artikel');
    }
    // public function beranda()
    // {
    //     $artikel = Artikel::all();
    //     return view('beranda', compact('artikel'));
    // }
}