<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currency';

    protected $fillable = [
        'name',
        'iso_char_code',
        'eng_name',
        'nominal',
    ];

    public function rates()
    {
        return $this->hasMany(CurrencyRate::class, 'iso_char_code', 'iso_char_code');
    }
}
