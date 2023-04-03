<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Mail;
class ContactController extends Controller
{
    public function index() {
        return view('guest.contact');
    }
    public function postContact(Request $request) {
//        echo '<pre>';
//        print_r($request->all());
//        exit(0);
        $data['full_name'] = $request->input('full_name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['subject'] = 'Contact Form';
        $data['message'] = $request->input('message');
        
        Mail::send(new ContactUs($data));
        return redirect()->back()->with('success', 'Message Send Successfully !');
    }
}
