<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'address',
        'birth_day',
        'identity_card',
        'identity_before',
        'identity_after',
        'company_name',
        'company_address',
        'company_tax_code',
        'email',
        'phone',
        'zalo',
        'fax',
        'note',
        'status_id',
    ];
    public function full_name()
    {
        return $this->last_name . " " .$this->first_name;
    }
    public function status(){
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
