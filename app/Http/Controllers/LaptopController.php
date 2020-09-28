<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Brand;
use App\Laptop;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laptop = Laptop::OrderBy('id', 'desc')->paginate(5);
        return view('laptop.index', compact('laptop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        return view('laptop.create', compact('brand'));
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
            'nama' =>  'required|min:3',
            'brand' =>  'required',
            'deskripsi' =>  'required',
            'image' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $laptop = new laptop;
        $laptop->nama = $request->nama;
        $laptop->brand_id = $request->brand;
        $laptop->deskripsi = $request->deskripsi;
        $laptop->stok = $request->stok;
        $laptop->harga = $request->harga;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama = Str::slug($request->nama) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/img/laptop');
            $image->move($destinationPath, $nama);
            $laptop->image = $nama;
        }

        if ($laptop->save()) {
            return redirect('/laptop')->with('message-success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('message-danger', 'Gagal genambahkan data');
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
        $dec = decrypt($id);
        $laptop = Laptop::find($dec);
        $brand = Brand::all();

        return view('laptop.detail', compact('laptop', 'brand'));
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
        $laptop = Laptop::find($dec);
        $brand = Brand::all();

        return view('laptop.edit', compact('laptop', 'brand'));
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
            'nama' =>  'required|min:3',
            'brand' =>  'required',
            'deskripsi' =>  'required',
            'image' => 'image|mimes:png,jpg,svg|max:2048',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $dec = decrypt($id);
        $laptop = Laptop::find($dec);

        $laptop->nama = $request->nama;
        $laptop->brand_id = $request->brand;
        $laptop->deskripsi = $request->deskripsi;
        $laptop->stok = $request->stok;
        $laptop->harga = $request->harga;

        $image = $request->file('image');
        if ($image) {
            $name = str::Slug($request->nama) . '.' . $image->getClientOriginalExtension();
            $location = public_path('/assets/img/laptop');
            $image->move($location, $name);
            $oldImage = $laptop->image;
            Storage::delete($oldImage);
            $laptop->image = $name;
        }

        if ($laptop->save()) {
            return redirect('/laptop')->with('message-success', 'Berhasil Merubah Data');
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
        $laptop = Laptop::find($dec);
        Storage::delete($laptop->image);

        $laptop->delete();

        if ($laptop) {
            return redirect()->back()->with('message-success', 'Data berhasil dihapus!');
        }
    }
}
