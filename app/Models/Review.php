<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gig_id',
        'rating'
    ];
    public function gig(){
        return $this->belongesTo(Gig::class);
    }
}
