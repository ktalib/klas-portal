<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalSearch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_number',
        'plot_number',
        'location',
        'land_use',
        'land_size',
        'owner_name',
        'certificate_number',
        'registration_date',
        'term',
        'has_mortgage',
        'has_lien',
        'has_caveat',
        'has_court_order',
        'user_id',
        'payment_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'registration_date' => 'date',
        'has_mortgage' => 'boolean',
        'has_lien' => 'boolean',
        'has_caveat' => 'boolean',
        'has_court_order' => 'boolean',
    ];

    /**
     * Get the user that requested the search.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the payment associated with the search.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}

