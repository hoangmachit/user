<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractDomains extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'contract_id',
        'domain_id',
        'name',
        'domain_name',
        'address',
        'domain_init_id',
        'note',
        'price',
        'price_special',
        'date_payment',
        'duration_id',
        'status_id',
    ];
    public function domains()
    {
        return $this->hasOne(Domains::class, 'id', 'domain_id');
    }
}
