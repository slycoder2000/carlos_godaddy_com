<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dance;

class DancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Dance::all();

        if(isset($_GET['filter'])) {
            if($_GET['filter']==1) {
                $data=[
                    'title' => 'Line Dances',
                    'dances' => dance::where('rosefav',1)->orderBy('dance','asc')->paginate(20)
                    ];
            } else {
                $data=[
                    'title' => 'Line Dances',
                    'dances' => dance::orderBy('dance','asc')->paginate(20)
                    ];
        
            }
                
        } else {
        $data=[
            'title' => 'Line Dances',
            'dances' => dance::orderBy('dance','asc')->paginate(20)
            ];
        }
        return view("dance.home")->with($data);
    }

    public function search()
    {
        //
        $search = $_GET['search'];
        //dd($search);
        //$search="fault";
        $data=[
            'title' => 'Line Dances',
            'dances' => dance::where('dance','like' , '%' . $search . '%')->paginate(20)
            ];
        return view("dance.home")->with($data);
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
