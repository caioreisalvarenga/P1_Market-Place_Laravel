<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto;
use \App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(6);
        return view('site.home', compact('produtos'));
    }

    public function details($slug)
    {
        if (Auth::check()) {
            $produto = Produto::where('slug', $slug)->first();
            return view('site.details', compact('produto'));
        } else {
            return redirect()->route('site.index');
        }
    }


    public function categoria($id)
    {

        if (Auth::check()) {

            $categoria = Categoria::find($id);

            $produtos = Produto::where('id_categoria', $id)->paginate(3);
            return view('site.categoria', compact('produtos', 'categoria'));
        }
    }
}
