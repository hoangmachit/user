<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'keyword',
        'page_contract',
        'page_customer',
        'page_design',
        'page_domain'
    ];
}
