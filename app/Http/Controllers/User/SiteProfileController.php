<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Collections;
use App\Models\Images;
use App\Models\{State,Districts};
use App\Models\UserAddress;
use App\Models\User;
use Auth;

class SiteProfileController extends Controller
{
   /**
     * * Author : Firaz
     * Display and edit user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        return view('users.profile.index');
    }
   /**
     * * Author : Firaz
     * get user address.
     *
     * @return User addrss 
     */
    public function getAddress(Request $request)
    {

        $data['states'] = State::get(["state_name","id"]);
        $user=User::find(Auth::user()->id);
        $data['address']=$user->addresses;
        $data['user']=$user;
        
        return view('users.profile.address',compact('data'));
    }
    public function addAddress(Request $request)
    {
        $address=new UserAddress();
        $address->user_id=Auth::user()->id;
        $address->full_name=$request->name;
        $address->email=$request->email;
        $address->mobile=$request->mobile;
        $address->address=$request->address;
        $address->pincode=$request->pincode;
        $address->town=$request->town;
        $address->district=$request->district;
        $address->state=$request->state;
        $address->landmark=$request->landmark;
        $address->alternate_phone=$request->alt_phone;
        $address->save();
        if($request->checkout)
        {
            $request->session()->put('address',$address->id);
        }
        return redirect()->back()->with('success', 'Address Added Succesfully !');
    }
    /**
     * * Author : Firaz
     * delete user address.
     *
     * @return success 
     */
    public function deleteAddress($id)
    {
        $adderss= UserAddress::find($id);
        $adderss->delete();
        return redirect()->back()->with('success', 'Address deleted Succesfully !');
    }
    
    public function editAddress($id)
    {
        $adderss= UserAddress::find($id);
        $data['states'] = State::get(["state_name","id"]);
        $user=User::find(Auth::user()->id);
        $data['address']=$user->addresses;
        $data['user']=$user;
        $data['adderss']= $adderss;
        return view('users.profile.edit-address',compact('data'));
    }
    public function doEditAddress(Request $request)
    {
    
        $addr= UserAddress::findOrFail($request->id);
        $addr->full_name=$request->name;
        $addr->email=$request->email;
        $addr->address=$request->address;
        $addr->pincode=$request->pincode;
        $addr->town=$request->town;
        $addr->district=$request->district;
        $addr->state=$request->state;
        $addr->landmark=$request->landmark;
        $addr->alternate_phone=$request->alt_phone;
        $addr->save();
        return redirect()->back()->with('success', 'Address updated Succesfully !');
    }
    public  function updateProfile(Request $request)
    {
        $user= User::findOrFail(Auth::user()->id);
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->date_of_birth=$request->date_of_birth;
        $user->anniversay_date=$request->anniversay_date;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated Succesfully !');
    }
    public static function getDist($id)
    {
        $dist=Districts::select('id','district_name')
        ->where('id',$id)
        ->first();
       return $dist;
    }
}
