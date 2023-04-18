<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'earned_at',
    ];
    public function user(){
        return $this->belongesTo(User::class);
    }
}
