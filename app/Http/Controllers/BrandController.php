<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::OrderBy('id', 'desc')->paginate(5);
        return view('brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>  'required|min:2',
            'alamat' =>  'required|min:5',
            'phone' =>  'required|numeric|min:10',
        ]);

        $brand = new Brand;
        $brand->nama = $request->nama;
        $brand->alamat = $request->alamat;
        $brand->phone = $request->phone;

        if ($brand->save()) {
            return redirect('/brand')->with('message-success', 'Berhasil Menambahkan Data');
        } else {
            return redirect()->back()->with('message-danger', 'Gagal Menambahkan Data');
        }
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
        $dec = decrypt($id);
        $brand = Brand::find($dec);

        return view('brand.edit', compact('brand'));
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
        $request->validate([
            'nama' =>  'required|min:2',
            'alamat' =>  'required|min:5',
            'phone' =>  'required|numeric|min:10',
        ]);

        $dec = decrypt($id);
        $brand = Brand::find($dec);
        $brand->nama = $request->nama;
        $brand->alamat = $request->alamat;
        $brand->phone = $request->phone;

        if ($brand->save()) {
            return redirect('/brand')->with('message-success', 'Berhasil Merubah Data');
        } else {
            return redirect()->back()->with('message-danger', 'Gagal Merubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dec = decrypt($id);
        $brand = Brand::find($dec);

        $brand->delete();

        if ($brand) {
            return redirect()->back()->with('message-success', 'Data berhasil dihapus!');
        }
    }
}
