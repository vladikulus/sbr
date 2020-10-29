<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class CurrencyRate extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'iso_char_code',
        'value',
    ];

    protected $allowedSorts = [
        'iso_char_code',
        'value',
    ];

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d');
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('iso_char_code', $value)->latest()->firstOrFail();
    }
}
