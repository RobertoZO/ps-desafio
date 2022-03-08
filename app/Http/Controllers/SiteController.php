<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Categoria;
use \App\Models\Produto;

class SiteController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('produtosInfo.mainprod', compact('produtos', 'categorias'));
    }

    public function filtro(Request $request)
    {
        $produtos = Produto::where('categoria_id', $request->input('categoria_id'))->get();
        $categorias = Categoria::all();
        return view('produtosInfo.mainprod', compact('produtos', 'categorias'));
    }

    public function categorias()
    {
        $categorias = Categoria::all();
        return view('produtosInfo.categoria', compact('categorias'));
    }



}
