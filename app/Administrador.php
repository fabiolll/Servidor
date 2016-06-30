<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'administrador';
    protected $primaryKey = 'cod_administrador';
    protected $fillable = [
        'login', 'senha', 'cod_administrador'
    ];

       public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  //  protected $hidden = [
    //    'password', 'remember_token',
    //];
}
