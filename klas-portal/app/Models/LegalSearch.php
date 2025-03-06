<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalSearch extends Model
{
    use HasFactory;

    protected $table = 'legal_searches'; // Specify the table name if different from the model name

    protected $fillable = [
        'file_number',
        'kangis_file_number',
        'mlsf_no',
        'plot_number',
        'plan_number',
        'plot_description',
        'assignor',
        'assignee',
        'registration_number',
        'location',
        'certificate_number',
        'status',
        'service_code',
        'payment_id',
    ];

    // Define any relationships if necessary
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}