<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table='papers';
    protected $fillable = [
        'user_id','title', 'category','description','likeNumber','dislikeNumber','file'
    ];
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function profile(){
        return $this->belongsTo('App\Profile','user_id');
    }
}
