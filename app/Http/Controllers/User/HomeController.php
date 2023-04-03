<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;

use DB;

use Auth;
use Redirect;
use Validator;

class HomeController extends Controller
{
    /**
     * * Author : Firaz
     * User Home .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('users.home.index');
    }
   /**
     * * Author : Mujthab
     * Get gold price history .
     *
     * @return \Illuminate\Http\Response
     */
    public function goldRateHistory()
    {
        $metalRate=DB::select('SELECT a.id,a.rate_date,a.rate_time,a.gold_24kt,(a.gold_24kt - b.gold_24kt) AS daily_deference,a.gold_22kt,a.gold_18kt,b.gold_24kt AS old_rate  FROM metal_rates a
                            LEFT JOIN metal_rates b ON a.id = b.id + 1
                            ORDER BY a.id DESC
                            LIMIT 10 ');
        return view('users.home.gold-rate-history',compact('metalRate'));
    }

        /**
     * * Author : Irshad
     * User subscribe newsletter .
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribeNewsletter(Request $request)
    {
        $validator=  Validator::make($request->all(), [
            'email' => 'required|unique:news_letters,email|email|max:100',
            ],[
                'email.required' => __('Email is required'),
                'email.email' => __('The email must be a valid email address'),
                'email.unique' => __('This Email has already been already subscribed'),
       ]);
                   if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                 }else{
                    $subscription = new NewsLetter();
                    $subscription->email = $request->email;
                    $subscription->save();
                    return redirect()->back()->with('success', 'Subscribed to NewsLetter !');
                 }
    }

  
}
