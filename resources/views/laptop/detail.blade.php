@section('title', 'Laptop')

@extends('layouts.template')

@section('content')

<section class="section">
    <div class="section-header">
        <div class="left ml-2">
            <h5>
                <a href="{{route('homepage')}}" style="text-decoration: none; color: black;">
                    ZeroNull
                </a>
            </h5>
        </div>
        <div class="right ml-auto mr-2">
            <a href="{{route('laptop.index')}}" class="btn btn-dark mx-1">Laptop</a>
            <a href="{{route('brand.index')}}" class="btn btn-dark mx-1">Brand</a>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Laptop</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <img src="{{asset('assets/img/laptop/'. $laptop->image)}}" alt="L" style="max-width: 15rem;">
                        </div>
                        <div class="col">
                            <h5>{{$laptop->nama}}</h5>
                            <p>{{$laptop->brand->nama}}</p>
                            <p><b>Deskripsi : </b>{{$laptop->deskripsi}}</p>
                            <p><b>Stok : </b>{{$laptop->stok}}</p>
                            <p><b>Karga : </b>{{$laptop->harga}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
