<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $countries = Countries::all();
        return $countries;
//        dd($coins);
    }

    
}
