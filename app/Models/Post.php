<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }
}
