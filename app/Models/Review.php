<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile_id',
        'review'
    ];
    public function gig(){
        return $this->belongesTo(Service::class);
    }
}
