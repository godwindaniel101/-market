<?php

namespace App\Http\Controllers;

use App\Market;
use App\Item;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Item $item)

    {
        $market = Market::orderBy('product_name')->get();
        $search = Item::all()->toArray();
        $newArray =Array();
        foreach($search as $a){
            $newArray[] = $a['item_name'];
        }

        if ($request->input('myCountry'))
        {
            $inputed =($request->input('myCountry'));
            $item= Item::all()->where('item_name' , $inputed);
            if($item){
                return view ('market.index', ['market'=> $market,'item' => $item]);
            }dd('goodnight');
        }
       
        $item = Item::orderBy('updated_at')->get();
        return view('market.index', ['market'=> $market,'item' => $item ,  $newArray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('market.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $add = Market::create([
           'product_name' => $request->input('product_name')
       ]);
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {   
        dd('got here');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {   
      $market_update = Market::where('id' , $market->id)->update(
          ['product_name' => $request->input('product_name')]
      );
      if($market_update){
         return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        $deleting = Market::where('id', $market->id)->delete();
        if($deleting){
           return back();
        }
    }

    public function search(Market $market)
    {
        //
    }
}
