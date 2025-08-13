<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'category_id',
        'payment_method_id',
        'type',
        'description',
        'amount',
        'installments',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user(): BelongTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function installments(): HasMany
    {
        return $this->hasMany(Installment::class);
    }
}
