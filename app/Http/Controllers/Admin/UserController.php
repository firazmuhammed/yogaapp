<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\PostalCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '=', 'customer')->get();
        return view('admin.users.index',compact('users'));
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

        /**
     * return List reviews
     *
     * @author  <Irshad>
     * @return  success
     */

    public function statusToggle($id)
    {
        $user = User::where('id', '=', $id)->first();
        if($user->isactive == 0){
            $user->isactive = 1;
            $user->update();
        }
        else if($user->isactive == 1){
            $user->isactive = 0;
            $user->update();
        }
        
        
        return redirect('dashboard/users')->with('success', 'Status changed Succesfully !');
    }

            /**
     * return List reviews
     *
     * @author  <Irshad>
     * @return  user profile
     */

    public function viewUser($id)
    {
        $user = User::where('id', '=', $id)->first();
        $userAddresses = UserAddress::select('user_addresses.*','states.state_name','districts.district_name')
                                    ->join('states','user_addresses.state','=','states.id')
                                    ->join('districts','user_addresses.district','=','districts.id')
                                    ->where('user_addresses.user_id', '=', $id)->get();
        return view('admin.users.view-user',compact('user','userAddresses')); 
    }

    public function viewPostalCodes()
    {
     
        $postcodes= PostalCode::all();
        return view('admin.postal.index',compact('postcodes')); 
    }
    public function addZipCode(Request $request)
    {
          $code=new PostalCode();
          $code->code=$request->code;
          $code->save();
          return redirect()->back()->with('success', 'postal code added succesfully !');
    }
    public function deletePostCode($id)
    {
        $code = PostalCode::findOrFail($id);
        $code->delete();

        return redirect()->back()->with('success', 'Postcode deleted Succesfully !');

    }
    public function editPostCode($id)
    {
        $code = PostalCode::findOrFail($id);
       

        return view('admin.postal.edit-code',compact('code')); 
    }
    public function updatePostCode(Request $request)
    {
        
        PostalCode::where('id', $request->id)
       ->update([
           'code' => $request->code
        ]);
        return redirect('dashboard/view-postcodes')->with('success', 'Updated Succesfully !');
    }
}
