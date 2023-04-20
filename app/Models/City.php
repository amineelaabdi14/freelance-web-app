<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function user(){
        return $this->hasMany(User::class);
    }
    
    public function service(){
        return $this->hasMany(Service::class);
    }
}
