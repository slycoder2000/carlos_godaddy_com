<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverToolsController extends Controller
{
    //


    public function index()
    {
        $title = 'Driver Tools - Calculator';
        return view('webapps.driverTools.calculator')->with('title',$title);
    }


    public function calculator()
    {
        $title = 'Driver Tools - Calculator';
        return view('webapps.driverTools.calculator')->with('title',$title);
    }
    public function count()
    {
        $title = 'Driver Tools - Count';
        return view('webapps.driverTools.count')->with('title',$title);
    }
    public function vehicle()
    {
        $title = 'Driver Tools - Vehicle';
        return view('webapps.driverTools.vehicle')->with('title',$title);
        }
    public function goals()
    {
        $title = 'Driver Tools - Goals';
        return view('webapps.driverTools.goals')->with('title',$title);
    }

}
