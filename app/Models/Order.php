<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'gig_id',
        'payment_method',
    ];
    public function gig(){
        return $this->belongesTo(Gig::class);
    }
    public function payment_method(){
        return $this->belongesTo(Payment_method::class);
    }
    
}
