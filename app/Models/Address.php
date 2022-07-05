<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'address_id', 'id');
    }

    /**
     * @return Attribute
     */
    protected function address(): Attribute
    {
        return Attribute::make(function ($value, $attributes) {
            return $attributes['street'] .
                ' ' . $attributes['house_number']
                . $attributes['house_number_suffix'];
        });
    }

    /**
     * @return array
     */
    public static function getAddressesDropdown(): array
    {
        return Address::query()
            ->get()
            ->pluck('address', 'id')
            ->toArray();
    }
}
