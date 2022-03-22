<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;
class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $produtos = Produto::inRandomOrder()->take(3)->get();

        return view('homepage')->with('produtos', $produtos);
    }

    
}
