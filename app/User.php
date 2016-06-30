<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        public $timestamps = false;

        
    protected $fillable = [
        'cnpj', 'senha'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 //   protected $hidden = [
   //     'password', 'remember_token',
  //  ];
}
