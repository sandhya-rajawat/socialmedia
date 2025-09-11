<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['user_id','content'];

    // casting
    protected $casts =[
        'created_at'=>'datetime',

    ];

    public function user(){
        return $this->belongsTo(User::class);
        

    }

}
