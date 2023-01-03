<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractHostings extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'contract_id',
        'package_id',
        'name',
        'gb',
        'ram',
        'price',
        'price_special',
        'package_infomations',
        'status_id'
    ];
}
