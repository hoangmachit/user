<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ContractCustomers;
use App\Models\ContractPrices;
use App\Models\ContractCancels;
use App\Models\ContractDesigns;
use App\Models\ContractDomains;

class Contracts extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'signing_date',
        'date_of_delivery',
        'payment_1st',
        'payment_2st',
        'date_payment_1st',
        'date_payment_2st',
        'note',
        'status_id',
    ];
    public function design()
    {
        return $this->hasOne(ContractDesigns::class, 'contract_id', 'id');
    }
    public function domains()
    {
        return $this->hasMany(ContractDomains::class, 'contract_id', 'id');
    }
    public function hostings()
    {
        return $this->hasMany(ContractHostings::class, 'contract_id', 'id');
    }
    public function cancels()
    {
        return $this->hasMany(ContractCancels::class, 'contract_id', 'id');
    }
    public function customers()
    {
        return $this->hasMany(ContractCustomers::class, 'contract_id', 'id');
    }
    public function price()
    {
        return $this->hasOne(ContractPrices::class, 'contract_id', 'id');
    }
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
