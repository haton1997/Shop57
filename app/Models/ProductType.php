<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
      'idCategory','name','slug','status',
    ];
    public function Category(){
        return $this->belongsTo('App\Models\Category','idCategory','id');
    }
}
