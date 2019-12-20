<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'feedback','user_id'
    ];

    protected $guarded = ['id'];

    public  function  user(){
        return $this->belongsTo('App\User');  //one to many
    }
}
