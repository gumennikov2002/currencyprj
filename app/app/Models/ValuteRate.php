<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValuteRate extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'num_code',
        'char_code',
        'nominal',
        'name',
        'value',
        'previous_value',
        'date',
        'previous_date'
    ];
}
