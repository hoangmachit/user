<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractDesigns extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'design_id',
        'first_name',
        'last_name',
        'url',
        'note',
        'date_start',
        'date_finish',
        'font_family',
        'url_example',
        'status_id',
        'photo',
    ];
    public function designs()
    {
        return $this->hasOne(Designs::class, 'id', 'design_id');
    }
}
