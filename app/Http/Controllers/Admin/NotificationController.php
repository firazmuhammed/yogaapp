<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use DB;
use Mail;

class NotificationController extends Controller
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
    public function createMail(Request $request)
    {
        
        $data=[
           
            'data'=> $request->message
   
         ];
         $subject=$request->subject;
         $users = User::where('role', '=', 'customer')->select('email')->get();
    foreach(   $users as $user)
    {
        $email = $user->email;
        $d=Mail::send('emails.custom-mail', $data, function($message) use ($email, $subject) {
           $message->to($email)->subject($subject);
        });
     
    }
    return redirect()->back()->with('success', 'Message send  Succesfully !');
    }
    public function sendMessage(Request $request) {
        $userPlayer=DB::table('users')
        ->select('device_id')
        ->where('device_id','!=',NULL)
        ->get();
       
        $a=array();
        foreach ($userPlayer as  $id) {
          $id->device_id;
          array_push($a,$id->device_id);
     
        }
       
        $content      = array(
            "en" => $request->message
            
        );
        $heading = array(
            "en" => $request->message
         );
        $hashes_array = array();
        array_push($hashes_array, array(
            "id" => "like-button",
            "text" => "Like",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "https://yoursite.com"
        ));
        array_push($hashes_array, array(
            "id" => "like-button-2",
            "text" => "Like2",
            "icon" => "http://i.imgur.com/N8SN8ZS.png",
            "url" => "https://yoursite.com"
        ));
        $fields = array(
            'app_id' => "739ac283-1b14-4cce-9b0e-eb2bda3e1773",
            'included_segments' => array('All'),
            'data' => array(
                "foo" => "bar"
            ),
            'contents' => $content,
            'headings' => $heading,
            'web_buttons' => $hashes_array,
            'big_picture' => 'http://aptusseafoods.com/images/appicon.jpg',
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NWM0Yjc0ODEtN2JjYS00NmIxLThiNjAtMThhYjkwZWNkNzY0'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $return["allresponses"] = $response;
$return = json_encode($return);

$data = json_decode($response, true);

$id = $data['id'];

return redirect()->back()->with('success', 'Message send  Succesfully !');
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

   
}
