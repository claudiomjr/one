<?php

namespace App\Http\Controllers;

use App\Coins;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer/index');
    }
    public function payment_form()
    {
        $coins = Coins::all();
        $one_share = array(
            'price'=> '0.06',
            'name' =>'One',
            'image'=> 'https://one-fund.io/wp-content/uploads/2018/08/oneshare64x64.png',
        );
        return view('customer/payment-form',compact('coins','one_share'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coins  $coins
     * @return \Illuminate\Http\Response
     */
    public function show(Coins $coins)
    {
        //
        $coins = Coins::all();
        return $coins;
//        dd($coins);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coins  $coins
     * @return \Illuminate\Http\Response
     */
    public function edit(Coins $coins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coins  $coins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coins $coins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coins  $coins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coins $coins)
    {
        //
    }
}
