<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'description',
        'price',
        'isActive',
        'image',
        'delivery_time'
    ];

    public function user(){
        return $this->belongesTo(User::class);
    }
    public function category(){
        return $this->belongesTo(Category::class);
    }
    public function reviews(){
        return $this->hasMany(Comment::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
}
