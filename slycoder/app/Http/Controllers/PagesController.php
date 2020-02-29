<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    // public function index() {
    //     $title = 'Welcome to SlyCoder.com!!';
    //     // return view('pages.index', compact('title'));
    //     return view('pages.index')->with('title', $title);
    // }

    public function index() {
        $data = array (
            'title' => 'Welcome to SlyCoder.com!!',
            'services' =>['Software Engineering','Web Development','Computer Repair and Upgrades','Video Conversion','Professional Consulting & Tutoring']
        );
        return view('pages.index')->with($data);
    }

    public function about() {
        $title = 'About Me';
        return view('pages.about')->with('title', $title);
    }

    public function contact() {
        $title = 'Contact Me';
        return view('pages.contact')->with('title', $title);
    }



    public function webapps() {
        $title = 'Web Apps';
        return view('pages.webapps')->with('title', $title);
    }

    public function alpha() {
        $title = 'Phonetic Alphabet';
        return view('pages.webapps.alpha')->with('title', $title);
    }

    public function foodbank() {
        $title = 'Food Banks';
        return view('pages.webapps.foodbank')->with('title', $title);
    }

    public function resources() {
        $title = 'Resources';
        return view('pages.resources')->with('title', $title);
    }


}