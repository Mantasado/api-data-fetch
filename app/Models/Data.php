<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'tool_number',
        'latitude',
        'longitude',
        'date',
        'bat_percentage',
        'import_date',
    ];
}
