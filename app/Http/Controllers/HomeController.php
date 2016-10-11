<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = (new Company())->mostSought();
        return view('guests.home',compact('companies'));
    }
}
