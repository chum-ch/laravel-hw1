<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'body'];
    
    public function User(){
        return $this->belongsTo(User::class);
    }
}
