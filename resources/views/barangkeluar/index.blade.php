@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><br>
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
            <div class="card-body">
                <div class="card">
                    <div class="card-header">Data Barang Keluar
                        <a href="{{ route('barangkeluar.create') }}" class="float-right btn btn-success btn-floating"> Tambah Data</a>
                    </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Tanggal</th>
                                                    <th>Jumlah</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($barangkeluar as $barangkeluars)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$barangkeluars->barang_id}}</td>
                                                    <td>{{$barangkeluars->tanggal}}</td>
                                                    <td>{{($barangkeluars->jumlah)}}</td>
                                                    <td>
                                                    <form action="{{ route('barangkeluar.destroy', $barangkeluars->id) }}"method="POST">
                                                        @csrf @method('delete')
                                                        <a href="{{ route('barangkeluar.edit',$barangkeluars->id) }}" class="btn btn-primary">Edit</a>
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin Menghapus Data?')">Delete</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection