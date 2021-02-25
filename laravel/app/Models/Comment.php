<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use cebe\markdown\Markdown as Markdown;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'tweet_id', 'comment'
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id');
      }

    public function parse(){
        $parser = new Markdown();
        return $parser->parse($this->comment);
    }

    public function getMarkdownBodyAttribute(){
        return $this->parse();
    }
}
