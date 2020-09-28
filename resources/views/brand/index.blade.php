@section('title', 'Brand')

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
            <a href="{{route('brand.create')}}" class="btn btn-dark mx-1"><i class="fa fa-plus"></i> Tambah Brand</a>
            <a href="{{route('laptop.index')}}" class="btn btn-dark mx-1">Laptop</a>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Brand</h4>
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
                                    <th style="width: 5%;">#</th>
                                    <th>Nama</th>
                                    <th style="width: 40%;">Alamat</th>
                                    <th>Phone</th>
                                    <th style="width: 13%;">Action</th>
                                </tr>
                                @foreach($brand as $br)
                                <tr>
                                    <th class="text-center">{{$loop->iteration}}</th>
                                    <td>{{$br->nama}}</td>
                                    <td>{{$br->alamat}}</td>
                                    <td>{{$br->phone}}</td>
                                    <td>

                                        <a href="{{route('brand.edit', encrypt($br->id))}}" class="btn btn-icon btn-light mx-1"><i class="far fa-edit"></i></a>

                                        <form action="{{route('brand.destroy',encrypt($br->id))}}" method="POST" style="display: inline;">
                                            <button href="#" class="btn btn-icon btn-danger mx-1" onclick="return confirm('Yakin menghapus data ini?')">
                                                @csrf
                                                @method('delete')
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$brand->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
