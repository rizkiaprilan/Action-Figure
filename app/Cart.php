<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'figure_id','user_id','figure_price'
    ];
    protected $guarded = ['id'];

    public  function  figure(){
        return $this->belongsTo('App\Figure');  //one to many
    }
    public  function  user(){
        return $this->belongsTo('App\User');  //one to many
    }
}
