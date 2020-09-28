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
            <a href="{{route('laptop.create')}}" class="btn btn-dark mx-1"><i class="fa fa-plus"></i> Tambah Laptop</a>
            <a href="{{route('brand.index')}}" class="btn btn-dark mx-1">Brand</a>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Laptop</h4>
                </div>
                <div class="card-body">

                    <!-- Alert -->
                    @if (session('message-success'))
                    <div class="alert alert-success alert-dismissible show fade mt-1">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('message-success') }}
                        </div>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr class="text-center">
                                    <th style="width: 3%;">#</th>
                                    <th>Nama</th>
                                    <th>Brand</th>
                                    <th>Deskripsi</th>
                                    <th>Image</th>
                                    <th style="width: 10%;">Stok</th>
                                    <th>Harga</th>
                                    <th style="width: 13%;">Action</th>
                                </tr>
                                @foreach($laptop as $lap)
                                <tr>
                                    <th class="text-center">{{$loop->iteration}}</th>
                                    <td>{{$lap->nama}}</td>
                                    <td>{{$lap->brand->nama}}</td>
                                    <td>{{$lap->deskripsi}}</td>
                                    <td class="text-center">
                                        <img class="avatar" src=" {{asset('assets/img/laptop/' . $lap->image)}} " alt="L">
                                    </td>
                                    <td>{{$lap->stok}}</td>
                                    <td>{{$lap->harga}}</td>
                                    <td>

                                        <a href="{{route('laptop.edit', encrypt($lap->id))}}" class="btn btn-icon btn-light mx-1"><i class="far fa-edit"></i></a>

                                        <form action="{{route('laptop.destroy',encrypt($lap->id))}}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-icon btn-danger mx-1" onclick="return confirm('Yakin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-footer">
                            {{$laptop->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
