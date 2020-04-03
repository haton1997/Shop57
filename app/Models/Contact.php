<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'idUser','message',
    ];
    // 1 contact 1 user
    public function User(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
