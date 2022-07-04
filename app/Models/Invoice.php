<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rules\In;
use Ramsey\Uuid\Type\Integer;

class Invoice extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $dates = [
        'invoice_date',
        'expiration_date',
        'created_at'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'invoice_number',
        'attention_to',
        'description',
        'invoice_date',
        'expiration_date',
        'debtor_id',
        'address_id'
    ];

    /**
     * @return HasMany
     */
    public function lines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function debtor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'debtor_id', 'id');
    }

    /**
     * @return int
     */
    public static function getNextInvoiceNumber(): int
    {
        $max = Invoice::query()->max('invoice_number') ?? 999;

        return $max + 1;
    }
}
