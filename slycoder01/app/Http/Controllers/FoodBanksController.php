<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodBank;
use App\FoodBankCity;


class FoodBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fbs = FoodBank::all();
        $fbcs = FoodBankCity::all();
      
        //dd($cities);

            return view('webapps.foodbank.showfoodbanks',['fbs' => $fbs,'fbcs'=>$fbcs]);
         
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $fbs = FoodBank::all();
        //dd($cities);

            return view('webapps.foodbank.addfoodbank',['fbs' => $fbs]);
        
        
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
                
        $data = request() -> validate([
            'name' => 'required|min:2'
        ]);

        $fb  = new FoodBank();
        $fb->name = request('name');
        $fb->phone = request('phone');
        $fb->address = request('address');
        $fb->address2 = request('address2');
        $fb->days = request('days');
        $fb->starttime = request('starttime');
        $fb->endtime = request('endtime');
        $fb->notes = request('notes');
        $fb->notes2 = request('notes2');
        $fb->save();

        return back();
        //dd($fb );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}