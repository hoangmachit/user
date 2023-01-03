<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContractPrices extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contract_id',
        'contract_price_1st',
        'contract_price_2st',
        'domain_price',
        'domain_price_special',
        'package_price',
        'package_price_special',
        'price_total',
    ];

}
