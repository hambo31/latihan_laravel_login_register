@extends('layouts.app')

@section('halamanProduk')

<style>
    #produk {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
    }

    #produk td,
    #produk th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #produk tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #produk tr:hover {
        background-color: #ddd;
    }

    #produk th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }

    h1 {
        text-align: center;
    }
</style>

@if (Auth::user())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>INPUT PRODUK BARU</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="/save">
                        @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="">Produk</label>
                                <input type="text" name="produk" id="" class="form-control" placeholder="Nama Produk">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Harga</label>
                                <input type="text" name="harga" id="" class="form-control" placeholder="Harga Produk">
                            </div>
                            <div class="form-group col-4">
                                <label for="">Kategori</label>

                                <select class="form-control custom-select" name="kategori">
                                    @foreach ($kategori as $k)
                                    <option value="{{$k->id}}">{{$k->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-8">
                                <label for="">Deskripsi</label>
                                <textarea type="text" name="deskripsi" id="" class="form-control"
                                    placeholder="Keterangan Produk "></textarea>
                            </div>
                            <div class="form-group col-4">
                                <label for="garansi">Garansi</label>
                                <input type="text" name="garansi" id="" class="form-control" placeholder="Bulan">
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" name="" id="" value="Saved">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


<br>
<h1>DAFTAR PRODUK</h1>
<table id="produk">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Garansi</th>
            <th>Input by</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>

        @php
        $count = 0;
        @endphp
        @foreach ($data as $item)
        <tr>
            <td> {{$count = $count+1}} </td>
            <td> {{$item->nama}} </td>
            <td> {{$item->name}} </td>
            <td>Rp {{$item->harga}} </td>
            <td> {{$item->garansi}} Bulan</td>
            <td> {{$item->created_by}} </td>
            <td> {{$item->desk}} </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection