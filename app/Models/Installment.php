<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Installment extends Model
{
    use HasFactory;

    protected $table = 'installments';

    protected $fillable = [
        'transaction_id',
        'installment_number',
        'amount',
        'due_date',
        'paid',
        'paid_at',
    ];

    protected $casts = [
        'due_date' => 'date',
        'paid' => 'boolean',
        'paid_at' => 'date',
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
