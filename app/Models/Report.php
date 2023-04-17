<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'message'
    ];
    public function gig(){
        return $this->belongesTo(Service::class);
    }
}
