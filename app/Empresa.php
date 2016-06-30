<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'empresa';
    protected $primaryKey = 'cod_empresa';
    protected $fillable = [
        'cnpj', 'senha', 'cod_empresa'
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
