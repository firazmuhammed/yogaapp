<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\{State,Districts};
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
    protected $guarded = array();
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'street',
        'mobile',
        'suburb',
        'state',
        'pick_up_location',
        'password',
        'pincode',
        'privillage_card_no'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function addresses()
    {
        return $this->hasMany('App\Models\UserAddress');
    }
    public function getDistrict($id)
    {
       $dist=Districts::select('district_name')
                    ->where('id',$id)
                    ->first();
       return $dist->district_name;
    }
    public function getState($id)
    {
       $state=State::select('state_name')
                    ->where('id',$id)
                    ->first();
       return $state->state_name;
    }
}
