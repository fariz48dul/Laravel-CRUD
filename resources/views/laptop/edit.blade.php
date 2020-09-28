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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Alert -->
                        <div class="form-group row mb-4">
                            @if (session('message-danger'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ session('message-danger') }}
                                </div>
                            </div>
                            @endif
                        </div>

                        <form method="POST" action="{{route('laptop.update',encrypt($laptop->id))}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Laptop</label>

                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $laptop->nama }}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control @error('brand') is-invalid @enderror" name="brand">
                                        <option value="">Pilih Brand</option>
                                        @foreach ($brand as $br)
                                        <option value="{{$br->id}}" @if ($br->id === $laptop->brand_id)
                                            selected
                                            @endif
                                            >
                                            {{ $br -> nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>

                                <div class="col-sm-12 col-md-7">
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $laptop->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <img class="avatar avatar-xl mb-3" src=" {{asset('assets/img/laptop/'. $laptop->image)}} " alt="L">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{old('image')}}">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok</label>

                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ $laptop->stok }}">
                                    @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>

                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $laptop->harga }}">
                                    @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                    <a href="{{route('laptop.index')}}" class="btn btn-icon btn-secondary mx-1">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
