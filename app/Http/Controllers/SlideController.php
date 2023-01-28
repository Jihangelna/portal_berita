<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slide::all();
        return view('slide.index', compact('data'));
        // // dd($slide);

        // return view('beranda', [
        //     'kategori' => $kategori,
        //     'slide' => $slide,
        //     'artikel' => $artikel
        // ]);
        // $data = Slide::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = Slide::all();
        return view('slide.create', compact('slide'));
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
            'judul_slide' => 'required|min:3',
            'gambar_slide' => 'mimes:png,jpg,jpeg'
        ]);


        if (!empty($request->file('gambar_slide'))) {
            $data = $request->all();
            $data['gambar_slide'] = $request->file('gambar_slide')->store('slide');

            Slide::create($data);
            // Alert::success('Success', 'Data Berhasil Tersimpan');
            return redirect('slide');
        } else {
            $data = $request->all();

            Slide::create($data);
            // Alert::success('Success', 'Data Berhasil Tersimpan');
            return redirect('slide');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slide = slide::findOrFail($id);
        Storage::delete($Slide->gambar_slide);
        $Slide->delete();
        return redirect('slide');
    }
}
