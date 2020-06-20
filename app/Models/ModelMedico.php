<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelMedico extends Model
{
    protected $table = 'medicos';
    protected $fillable=['name','id_user','activities','price'];

    public function relUsers()
    {
        return $this->hasOne('App\User','id','id_user');
    }
}
