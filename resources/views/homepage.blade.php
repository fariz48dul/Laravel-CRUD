@section('title', 'ZeroNull Laptop')

@extends('layouts.template')

@section('content')

<section class="section">
    <div class="section-header">
        <div class="left ml-2">
            <h5>
                <a href="#" style="text-decoration: none; color: black;">
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
        <div class="row">

            @foreach ($laptop as $lap)

            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{asset('assets/img/laptop/' . $lap->image)}}">
                        </div>
                        <div class="article-title">
                            <h2><a href="#">{{$lap->nama}}</a></h2>
                            <small>{{$lap->brand->nama}}</small>
                        </div>
                    </div>
                    <div class="article-details">
                        <h5>Harga : <b>Rp. {{$lap->harga}}</b></h5>
                        <h6>Deskripsi : </h6>
                        <span class="d-inline-block text-truncate" style="max-width: 60%">
                            <p>{{$lap->deskripsi}}</p>
                        </span>
                        <div class="article-cta">
                            <a href="{{route('laptop.show', encrypt($lap->id))}}" class="btn btn-info">Read More</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        <div class="card-footer text-center">
            <nav class="d-inline-block">
                {{$laptop->links()}}
            </nav>
        </div>
    </div>
</section>

@endsection
