<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plans;
use DB;

class PlansController extends Controller
{
    /**
     * * Author : Firaz
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plans::all();
        return view('admin.plans.index',compact('plans'));
    }
    
}
