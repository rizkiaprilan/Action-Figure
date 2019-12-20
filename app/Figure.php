<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    protected $fillable = [
        'name', 'price', 'quantity','description','photo','category'
    ];
    protected $guarded = ['id'];

    public  function  cart(){
        return $this->hasMany('App\Cart');  //one to many
    }

}
