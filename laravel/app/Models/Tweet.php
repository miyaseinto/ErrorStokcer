<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweets';

    protected $fillable = [
        'title', 'user_id','content',
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class,'tweet_id', 'id');
    }
}
