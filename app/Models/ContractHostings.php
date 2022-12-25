<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractHostings extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'package_id',
        'gb',
        'ram',
        'price',
        'price_special',
        'infomations',
        'status'
    ];
}
