<?php

namespace App\Http\Controllers;

use App\Item;
use App\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $market = Market::orderBy('product_name')->get();
    return view('item.create' , ['market'=> $market]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    $data = request()->validate([

        'product_id' => 'required',
        'item_name' => 'required',
        'item_cost' => 'required|numeric',
        'item_image' => 'required',
        'item_description' => 'required',
        'item_new_cost' => 'required|numeric',
        'item_stock' => 'required|numeric'       
    ]);

    if($data){
       
        $item_cost = $request->input('item_cost');
        $item_new_cost = $request->input('item_new_cost');
        $item_save =round($item_cost - $item_new_cost, 2);
        $item_percentaged =round((($item_cost - $item_new_cost)/$item_cost)*100, 2);

        if ($request->hasFile('item_image')) 
        {

             $file = $request->file('item_image');
             $filename =Str::random(32).'_'. $file->getClientOriginalName();
             $size = $file->getClientSize();
             $destinationPath = public_path('images');
             $file->move($destinationPath, $filename);
             $type = $file->getClientOriginalExtension();
                $imagearray =  array("jpg" , "png");
                $videoarray =  array("3gp" , "mp4");

                if(in_array($type , $imagearray)){
                    $imagefile = $filename;
                    $videofile = '';
                } elseif(in_array($type , $videoarray)){
                        $videofile = $filename;
                        $imagefile = '';
                } 
        }else {
            $imagefile = '';
            $videofile = '';
            
        };
     $solution = [
        'product_id' => $request->input('product_id'),
        'item_name' => $request->input('item_name'),
        'item_cost' => $request->input('item_cost'),
        'item_image' => $imagefile,
        'item_description' => $request->input('item_description'),
        'item_new_cost' => $request->input('item_new_cost'),
        'item_stock' => $request->input('item_stock'), 
        'item_saved' =>   $item_save ,
        'item_percentage' =>   $item_percentaged,
     ];
     
     Item::create($solution);
   
     return redirect ('market');}
     else{
         back();
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    { $detail = Item::where('id' , $item->id)->get();
        return view('item.show', ['detail'=> $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
