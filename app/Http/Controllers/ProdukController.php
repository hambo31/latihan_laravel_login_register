<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ProdukController extends Controller
{
   


    public function index()
    {
        //$data = Produk::all();
        $data = DB::table('produk')
        ->select('*', 'produk.deskripsi as desk')
        ->leftJoin('kategori', 'produk.id_kategori', '=', 'kategori.id')
        ->leftJoin('garansi', 'garansi.id_produk', '=', 'produk.id')
        ->get();

        $kat = Kategori::all();

        return view('test', ['data' => $data, 'kategori' => $kat]);
    }
    

    public function save(Request $request)
    {
       $data =  DB::table('produk')->insertGetId(
            [
                'nama' => $request->produk,
                'id_kategori' => $request->kategori,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi
                
            ] );
           
        DB::table('garansi')->insert(
                [
                    'garansi' => $request->garansi,
                    'id_produk' => $data,
                    'created_by' => Auth::user()->name
                ]
                );
           
        

            return redirect('/test');
    }
}
