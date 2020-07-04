<?php

namespace App;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'description', 'text', 'image', 'user_id', 'category_id', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

