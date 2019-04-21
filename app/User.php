<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public $rules = [
        'username'          =>  'required|min:10|unique:users,username',
        'email'             =>  'required|email|unique:users,email',
        'password'          =>  'required'
    ];

    public $messages = [
        'username.required' => 'username không được để trống',
        'username.min'      => 'username tối tiểu 10 ký tự',
        'email.required'    => 'email không được để trống',
        'email.email'       => 'email không đúng định dạng',
        'password.required' => 'password không được để trống'
    ];


    public function product(){
        return $this->hasMany('App\Product');
    }





}
