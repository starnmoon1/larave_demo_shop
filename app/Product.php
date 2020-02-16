<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable =['name','description','price','image','category_id'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
}
