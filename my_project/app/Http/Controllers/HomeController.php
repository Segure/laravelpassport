<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

/*        $elementos = array(
            array(
                "nome" => "Peter Parker $code",
                "desc" => "peterparker@mail.com",
            ),
            array(
                "nome" => "Clark Kent",
                "desc" => "clarkkent@mail.com",
            ),
            array(
                "nome" => "Harry Potter",
                "desc" => "harrypotter@mail.com",
            )
        );  
        return $elementos;        */
    }
}
