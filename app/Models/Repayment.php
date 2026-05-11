<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'amount_paid',
        'payment_date',
        'payment_method',
        'reference_number',
        'status',
        'notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount_paid' => 'decimal:2',
    ];

    /**
     * Relasi ke loan
     */
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}