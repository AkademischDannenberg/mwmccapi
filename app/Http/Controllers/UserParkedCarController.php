<?php

namespace App\Http\Controllers;

use App\Models\SalesOffer;
use App\Models\User;
use App\Models\UserParkedCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserParkedCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_parkings = User::find(Auth::id())->parkings;
        $parkingsToReturn = [];
        foreach ($user_parkings as $entry) {
            array_push($parkingsToReturn, ['parking_id' => $entry->id, 'sales_offer' => SalesOffer::find($entry->sales_offer_id)]);
        }
        return $parkingsToReturn;
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
            'sales_offer_id' => 'required|numeric|integer'
        ]);
        $user = Auth::user();
        $parking = new UserParkedCar;
        $parking->user_id = $user->id;
        $parking->sales_offer_id = $request['sales_offer_id'];
        $parking->save();
        return SalesOffer::find($request['sales_offer_id']) . ' erfolgreich geparkt';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //unnötig
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
        //unnötig
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return UserParkedCar::destroy($id);
    }
}
