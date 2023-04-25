<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{
    use HasFactory;use SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'description',
        'isActive',
        'price',
        'image',
        'work_time',
        'city_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function report(){
        return $this->hasMany(Report::class);
    }
}
