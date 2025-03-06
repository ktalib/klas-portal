<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'amount',
        'status',
        'service_code',
        'user_id',
    ];

    // Define any relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function legalSearch()
    {
        return $this->hasOne(LegalSearch::class);
    }
}