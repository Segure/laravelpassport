<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElementoController extends Controller
{
    
    public function index(request $request)
    {


	  	     $nome = $request->query('nome');
		$sobrenome = $request->query('sobrenome');


	$elementos = array(
		    array(
		        "nome" => "$nome",
		        "desc" => "$sobrenome",
		    ),
		    array(
		        "nome" => "Clark",
		        "desc" => "Kent",
		    ),
		    array(
		        "nome" => "Harry",
		        "desc" => "Potter",
		    )
		);	
	    return $elementos;

    }

}
