<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded  = ['created_at', 'updated_at'];
    use HasFactory;

    protected $date = [
        'published_at',
    ];

    // Eloquent relation
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
