<?php

namespace App\Http\Controllers;

use App\Models\SalesOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SalesOffer::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'image' => 'required|string|max:220',
            'description' => 'required|string|max:1200',
            'price' => 'required|integer|numeric',
            'kms' => 'required|integer|numeric'
        ]);

        $sales_offer = new SalesOffer;
        $sales_offer->name = $request['name'];
        $sales_offer->image = $request['image'];
        $sales_offer->description = $request['description'];
        $sales_offer->price = $request['price'];
        $sales_offer->kms = $request['kms'];
        $sales_offer->user_id = Auth::id();
        $sales_offer->save();
        return $sales_offer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SalesOffer::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sales_offer = SalesOffer::find($id);
        $sales_offer->update($request->all());
        return $sales_offer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return SalesOffer::destroy($id);
    }

    /**
     * Find the specified resource by name
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return SalesOffer::where('name', 'like', '%' . $name . '%')->get();
    }
}
